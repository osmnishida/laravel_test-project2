<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EditProfileController extends Controller
{
    public function edit(User $users) {
        $user = User::where('id', auth()->id())->get();
        return view('user.editprofile', compact('user'));
    }

    public function update(Request $request, User $user) {
        $validated = $request->validate([
            'name' => 'required|max:16',
            'email' => 'email:rfc,dns',
            'password' => 'required|max:100',
        ]);
        $user->update($validated);
        $request->session()->flash('message','更新しました');
        return back();
    }
    
}
