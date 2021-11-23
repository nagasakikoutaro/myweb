<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Coment;

class ComentController extends Controller
{
     public function show(Request $request)
    {
      $comments = Coment::select('*')->paginate(2);

     
        return view('coment.show', [ 'comments' => $comments]);
    }

     public function create(Request $request)
    {
      $this->validate($request, Coment::$rules);
      $comment = new Coment;
      $form = $request->all();
      unset($form['_token']);
      $comment->fill($form);
      $comment->save();
        return redirect('comment/show');
    }
  
}
