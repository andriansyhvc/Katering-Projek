<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('merchant.profile.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'alamat' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'no_hp' => ['required', 'max:15'],
            'deskripsi' => ['required'],
            'image' => ['image', 'max:2048']
        ]);

        $merchant = Auth::user();

        if ($request->hasFile('image')) {
            if (File::exists(public_path($merchant->image))) {
                File::delete(public_path($merchant->image));
            }
            $image = $request->image;
            $imageName = rand() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path = "/uploads/" . $imageName;

            $merchant->image = $path;
        }

        $merchant = Auth::user();

        $merchant->name = $request->name;
        $merchant->alamat = $request->alamat;
        $merchant->email = $request->email;
        $merchant->no_hp = $request->no_hp;
        $merchant->deskripsi = $request->deskripsi;
        $merchant->save();

        toastr()->success('Profile Berhasil Diupdate!');

        return redirect()->back();
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        toastr()->success('Password Berhasil Diupdate!');
        return redirect()->back();
    }
}
