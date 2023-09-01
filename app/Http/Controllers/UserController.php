<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function show(User $user) {
        return view('user.showuser', compact('user'));
    }

    public function edit(User $user) {
        return view('user.edituser', compact('user'));
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

    public function destroy(Request $request,User $user) {
        $user->delete();
        $request->session()->flash('message', '削除しました');
        return redirect()->route('user.index');
    }
}
