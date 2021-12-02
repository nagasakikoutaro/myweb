<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Coment;
use App\Profile;
class ComentController extends Controller
{

     public function store(Request $request)
    {
      //コメントを保存する
      $this->validate($request, Coment::$rules);
      $comment = new Coment;
      $form = $request->all();
      unset($form['_token']);
      $comment->fill($form);
      $comment->save();
     
 
       return redirect('/');
    }
    public function show(Request $request)
    {  //プロフィールごとのコメントを取得する
       $id = Profile::all()->id;
       $comment = Coment::findOrFail($id);
     
        return view('coment.show', [ 'comment' => $comment]);
    }
  
  
}
