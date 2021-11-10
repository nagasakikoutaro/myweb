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

    public function edit()
    {
        return view('content.coment.edit');
    }

    public function update()
    {
        return redirect('content/coment/edit');
    }
}