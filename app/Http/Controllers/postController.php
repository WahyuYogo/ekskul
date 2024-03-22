<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Posts::orderBy('ekskul', 'desc')->paginate(5);
        $ekskul = $request->input('ekskul', 'osis');
        $posts = Posts::where('ekskul', $ekskul)->get();
        $users = User::all();
        return view('dashboard.index', compact('posts', 'ekskul', 'users'));
    }

    public function filter(Request $request)
    {
        $ekskul = $request->input('ekskul');
        return redirect()->route('dashboard.index', ['ekskul' => $ekskul]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('dashboard.posts', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Session::flash('judul',$request->judul);
        // Session::flash('ekskul',$request->ekskul);
        // Session::flash('gambar',$request->gambar);
        $request->validate([
            'judul' => 'required|string|max:255',
            'ekskul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:4048',
        ]);

        $imageName = time() . '.' . $request->gambar->extension();  
        $request->gambar->move(public_path('images'), $imageName);

        $post = new Posts;
        $post->judul = $request->judul;
        $post->ekskul = $request->ekskul;
        $post->gambar = '/images/' . $imageName;
        $post->save();


        return redirect()->route('user.index')->with('success', 'Post berhasil diunggah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        $post = Posts::where('id', $id)->first();
        return view('dashboard.edit', compact('user'))->with('data', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:4048',
            'judul' => 'required|string|max:255',
            'ekskul' => 'required|string|max:255',
        ]);

        $post = Posts::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();  
            $request->gambar->move(public_path('images'), $imageName);
            $post->gambar = '/images/' . $imageName;
        }

        $post->judul = $request->judul;
        $post->ekskul = $request->ekskul;
        $post->save();

        return redirect()->route('user.index')->with('success', 'Post berhasil diperbarui.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Posts::where('id', $id)->delete();
        return redirect()->route('user.index')->with('success', 'Post Berhasil di Hapus');
    }
}
