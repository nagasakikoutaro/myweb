<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{
    public function add()
    {
        return view('content.profile.create');
    }

    public function create(Request $request)
    {
     $this->validate($request, Profile::$rules);
      $profile = new Profile;
      $form = $request->all();
      
      // フォームから画像が送信されてきたら、保存して、$profile->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $profile->image_path = basename($path);
      } else {
          $profile->image_path = null;
      }
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      // データベースに保存する
      $profile->fill($form);
      $profile->save();
        return redirect('content/profile/create');
    }

    public function edit(Request $request)
    {
         $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('content.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
      $this->validate($request, Profile::$rules);
      $profile = Profile::find($request->id);
      $profile_form = $request->all();
      if ($request->remove == 'true') {
          $news_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $profile_form['image_path'] = basename($path);
      } else {
          $profile_form['image_path'] = $profile->image_path;
      }
      
      unset($profile_form['image']);
      unset($profile_form['remove']);
      unset($profile_form['_token']);
      $profile->fill($profile_form)->save();

        return redirect('content/profile');
    }
    
    public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Profile::where('name', $cond_title)->get();
      } else {
          $posts = Profile::all();
      }
      return view('content.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }

}
