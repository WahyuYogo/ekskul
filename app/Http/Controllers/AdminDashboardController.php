<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function editPassword($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->view('dashboard.index')->with('success', 'Password Berhasil Diperbarui.');
    }

    public function deleteAccount($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin')->with('success', 'Akun Telah Berhasil Terhapus.');
    }

    public function delete(string $id)
    {
        Posts::where('id', $id)->delete();
        return redirect()->route('admin')->with('success', 'Post Berhasil di Hapus');
    }
}
