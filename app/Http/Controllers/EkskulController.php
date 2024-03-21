<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    public function index(){
        $data = Posts::all();
        return view('landingpage.index', compact('data'));
    }
    public function junalistik(){
        return view('ekskul.jurnalistik');
    }
}
