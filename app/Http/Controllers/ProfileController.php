<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Coment;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $posts = Profile::all()->sortByDesc('updated_at');

     
        return view('profile.index', [ 'posts' => $posts]);
    }
    
   public function show(Request $request)
    {
       $id = $request->id;
       $profile = Profile::findOrFail($id);
     
        return view('profile.show', [ 'profile' => $profile]);
    }
  
    
}
