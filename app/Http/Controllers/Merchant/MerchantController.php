<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function dashboard()
    {
        return view('merchant.dashboard');
    }

    public function login()
    {
        return view('merchant.auth.login');
    }

    public function register()
    {
        return view('merchant.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'role' => ['required', 'in:user,merchant'],
            'password' => ['required', 'confirmed'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request['role'],
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('merchant.login');
    }
}
