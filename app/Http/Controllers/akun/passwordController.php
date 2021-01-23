<?php

namespace App\Http\Controllers\akun;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class passwordController extends Controller
{
    public function edit(){
        return view('password.editPassword');
    }

    public function update(){
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $passwordAsli = auth()->user()->password;
        $old_password = request('old_password');

        if(Hash::check($old_password, $passwordAsli)) {
            auth()->user()->update([
                'password' => bcrypt(request('password'))
            ]);
            return back()->with('sukses', 'Password berhasil diperbarui');
        } else{
            return back()->withErrors(['old_password' => 'Tolong isi password lama dengan benar']);
        }
    }
}
