<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\profil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index(Request $request){
        $user = auth()->user();
        $profile = $user->profile;
        $users = Auth::user()->name;
        $ekskul = $request->input('ekskul', $users);
        $show = Posts::where('ekskul', $ekskul)->latest()->paginate(8);
        $jumlah = $show->count();
        // $profiles = Profil::where('user_id', auth()->id())->firstOrFail();
        return view('user.index', compact('user', 'profile', 'show', 'jumlah'));
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
            'link' => 'nullable|string',
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
            'link' => $request->link,
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
            'link' => 'nullable|string',
            'warna' => 'required|string|max:7',
        ]);

        // Perbarui data profil
        $profile->nama = $request->nama;
        $profile->tujuan = $request->tujuan;
        $profile->keuntungan = $request->keuntungan;
        $profile->link = $request->link;
        $profile->warna = $request->warna;

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $imageName);
            $profile->foto = '/images/' . $imageName;
        }

        $profile->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }
}
