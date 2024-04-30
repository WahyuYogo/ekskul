<?php

namespace App\Http\Controllers;

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

        return redirect()->route('dashboard.index')->with('success', 'Password updated successfully.');
    }

    public function deleteAccount($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard.index')->with('success', 'Account deleted successfully.');
    }
}
