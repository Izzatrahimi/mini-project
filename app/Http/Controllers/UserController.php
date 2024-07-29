<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showDetails()
    {
        $user = Auth::user();
        return view('user.details', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->update($request->all());
        return redirect()->route('user.details')->with('success', 'User details updated successfully.');
    }

    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        Auth::logout(); // Logout the user after deleting the account
        return redirect()->route('home')->with('success', 'Your account has been deleted successfully.');
    }
}

