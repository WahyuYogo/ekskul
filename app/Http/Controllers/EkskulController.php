<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\profil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class EkskulController extends Controller
{
    public function index()
    {
        // $posts = Posts::latest()->limit(4)->get();
        $posts = Posts::whereHas('user', function ($query) {
            $query->where('suspended', false);
        })->latest()->limit(4)->get();
        $profils = profil::latest()->limit(4)->get();
        return view('landingpage.index', compact('posts', 'profils',));
    }

    public function show($name)
    {
        $profils = profil::where('nama', $name)->firstOrfail();

        if ($profils->user->suspended) {
            return view('ekskul.berhenti', compact('profils'));
        }

        $posts = Posts::where('ekskul', $profils->nama)->latest()->get();
        return view('ekskul.show', compact('profils', 'posts'));
    }

    public function post($name)
    {
        $profils = profil::where('nama', $name)->firstOrfail();
        $posts = Posts::where('ekskul', $profils->nama)->latest()->paginate(9);
        return view('ekskul.post', compact('profils', 'posts'));
    }

    public function LSE(Request $request)
    {
        $search = $request->input('search');

        $profils = profil::when($search, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('tujuan', 'like', '%' . $search . '%')
                ->orWhere('keuntungan', 'like', '%' . $search . '%');
        })->get();

        return view('ekskul.lihatekskul', compact('profils', 'search'));
    }

    public function LSP(Request $request)
    {
        $search = $request->input('search');

        $posts = Posts::when($search, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('ekskul', 'like', '%' . $search . '%');
        })->latest()->paginate(10);

        return view('ekskul.lihatpost', compact('posts', 'search'));
    }
}
