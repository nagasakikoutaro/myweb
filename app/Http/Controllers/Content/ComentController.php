<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Coment;

class ComentController extends Controller
{
     public function add()
    {
        return view('content.coment.create');
    }

    public function create(Request $request)
    {
      $this->validate($request, Coment::$rules);
      $coment = new Coment;
      $form = $request->all();
      unset($form['_token']);
      $coment->fill($form);
      $coment->save();
        return redirect('content/coment/create');
    }
    
    public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Coment::where('name', $cond_title)->get();
      } else {
          $posts = Coment::all();
      }
      return view('content.coment.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }

    public function edit(Request $request)
    {
         $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
        return view('content.coment.edit',['profile_form' => $profile]);
    }

    public function update()
    {
      $this->validate($request, Coment::$rules);
      $coment = Coment::find($request->id);
      $coment_form = $request->all();
      unset($coment_form['_token']);
      $coment->fill($coment_form)->save();

        return redirect('content/coment');
    }
    
    public function delete(Request $request)
  {
      $coment = Coment::find($request->id);
      // 削除する
      $coment->delete();
      return redirect('content/coment');
  }  
}