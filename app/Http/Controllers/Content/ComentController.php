<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComentController extends Controller
{
     public function add()
    {
        return view('content.coment.create');
    }

    public function create()
    {
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