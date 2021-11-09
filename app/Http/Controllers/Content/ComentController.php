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

    public function edit()
    {
        return view('content.coment.edit');
    }

    public function update()
    {
        return redirect('content/coment/edit');
}
}