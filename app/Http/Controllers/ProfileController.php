<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $posts = Profile::all()->sortByDesc('updated_at');

     
        return view('profile.index', [ 'posts' => $posts]);
    }
    
    public function show(Request $request)
{
    $id = $request-> id;
    $post = Profile::findOrFail($id);
 
    return view('profile.show', [
        'post' => $post,
    ]);
}
}
