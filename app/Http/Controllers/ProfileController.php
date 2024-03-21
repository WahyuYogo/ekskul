<?php

namespace App\Http\Controllers;

use App\Models\profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function index(){
        $user = auth()->user();
        $profile = $user->profile;
        // $profile = Profil::where('user_id', auth()->id())->firstOrFail();
        return view('user.index', compact('user', 'profile'));
    }

    public function show()
    {
        $user = auth()->user();
        $profile = $user->profile;
        $profils = Profil::where('user_id', auth()->id())->firstOrFail();
        return view('profile.show', compact('user', 'profile', 'profils'));
    }

    public function create()
    {
        $user = auth()->user();
        if (!$user->profile) {
            return view('profile.create');
        } else {
            return redirect()->route('user.index');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required|string|max:255',
            'tujuan' => 'required|string',
            'keuntungan' => 'required|string',
            'warna' => 'required|string|max:7',
        ]);

        $photoPath = time() . '.' . $request->foto->extension();  
        $request->foto->move(public_path('images'), $photoPath);
        $foto = '/images/' . $photoPath;

        profil::create([
            'user_id' => auth()->id(),
            'foto' => $foto,
            'nama' => $request->nama,
            'tujuan' => $request->tujuan,
            'keuntungan' => $request->keuntungan,
            'warna' => $request->warna,
        ]);

        return redirect()->route('user.index')->with('success', 'Profil berhasil dibuat!');
    }

    public function edit()
    {
        $profile = Profil::where('user_id', auth()->id())->firstOrFail();
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = profil::where('user_id', auth()->id())->firstOrFail();

        // Validasi data
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required|string|max:255',
            'tujuan' => 'required|string',
            'keuntungan' => 'required|string',
            'warna' => 'required|string|max:7',
        ]);

        // Perbarui data profil
        $profile->nama = $request->nama;
        $profile->tujuan = $request->tujuan;
        $profile->keuntungan = $request->keuntungan;
        $profile->warna = $request->warna;

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();  
            $request->foto->move(public_path('images'), $imageName);
            $profile->foto = '/images/' . $imageName;
        }

        $profile->save();

        return redirect()->route('user.index')->with('success', 'Profil berhasil diperbarui!');
    }

    public function delete()
    {
        auth()->user()->profile()->delete();
        return redirect()->route('user.index');
    }
}