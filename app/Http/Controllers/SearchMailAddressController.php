<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchMailAddressController extends Controller
{
    public function search(Request $request) {
        $email = $request->searchmailaddress;
        $searchusers = User::where('email', $email)->get();
        // $searchusers =  User::all();
        return view('user.showsearchuser', compact('searchusers'));
        // return view('user.showsearchuser',compact('email'));
        // $searchusers = User::where('email', '=', '');
        // return view('user.index', compact('searchusers'));
    }
}
