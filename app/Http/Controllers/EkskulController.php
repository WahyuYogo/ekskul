<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\profil;
use App\Models\User;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    public function index(){
        $posts = Posts::all();
        $profils = profil::all();
        $users = User::has('profile')->get();
        return view('landingpage.index', compact('users', 'posts', 'profils'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $profils = profil::where('user_id', $id)->firstOrFail();
        return view('ekskul.show', compact('user', 'profils'));
    }
}
