<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\profil;
use App\Models\User;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    public function index(){
        $posts = Posts::latest()->limit(3)->get();
        $profils = profil::latest()->limit(4)->get();
        return view('landingpage.index', compact('posts', 'profils'));
    }

    public function show($name)
    {  
        $profils = profil::where('nama', $name)->firstOrfail();
        $posts = Posts::where('ekskul', $profils->nama)->get();
        return view('ekskul.show', compact('profils', 'posts'));
    }

    public function post($name)
    {
        $profils = profil::where('nama', $name)->firstOrfail();
        $posts = Posts::where('ekskul', $profils->nama)->get();
        return view('ekskul.post', compact('profils', 'posts'));
    }
}
