<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function add()
    {
        return view('content.profile.create');
    }

    public function create()
    {
        return redirect('content/profile/create');
    }

    public function edit()
    {
        return view('content.profile.edit');
    }

    public function update()
    {
        return redirect('content/profile/edit');
    }

}
