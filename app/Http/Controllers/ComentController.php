<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Coment;

class ComentController extends Controller
{
     public function index(Request $request)
    {
        $comment = Coment::all()->sortByDesc('updated_at');

     
        return view('coment.index', [ 'posts' => $posts]);
    }
}
