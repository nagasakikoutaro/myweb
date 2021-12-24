<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Coment;
use Storage;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        //プロフィールを表示する
       $posts = Profile::orderBy('created_at', 'desc')->paginate(10);

     
        return view('profile.index', [ 'posts' => $posts]);
    }
    
   public function show(Request $request)
    {
        //個別のページを作成する
       $id = $request->id;
       $profile = Profile::findOrFail($id);
     
        return view('profile.show', [ 'profile' => $profile]);
    }
     public function add()
    {
        return view('profile.create');
    }

    public function create(Request $request)
    {
        //プロフィールを保存する
      $this->validate($request, Profile::$rules);
      $profile = new Profile;
      $profile_form = $request->all();
      if (isset($profile_form['image'])) {
    $path = Storage::disk('s3')->putFile('/',$profile_form['image'],'public');
    $profile->image_path = Storage::disk('s3')->url($path);
      } else {
          $profile->image_path = null;
      }
      unset($profile_form['_token']);
      unset($profile_form['image']);
      $profile->fill($profile_form);
      $profile->save();
        return redirect('/');
    }

    public function edit(Request $request)
    {
         $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
      $this->validate($request, Profile::$rules);
      $profile = Profile::find($request->id);
      $profile_form = $request->all();
      if ($request->remove == 'true') {
          $profile_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = Storage::disk('s3')->putFile('/',$profile_form['image'],'public');
          $profile->image_path = Storage::disk('s3')->url($path);
      } else {
          $profile_form['image_path'] = $profile->image_path;
      }
      
      unset($profile_form['image']);
      unset($profile_form['remove']);
      unset($profile_form['_token']);
      $profile->fill($profile_form)->save();

        return redirect('/');
    }
  
  public function delete(Request $request)
  {
      $profile = Profile::find($request->id);
      $profile->delete();
      return redirect('/');
  }  
  
    
}
