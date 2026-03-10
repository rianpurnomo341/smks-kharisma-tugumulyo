<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function edit()
    {
        return view('admin.profiladmin', [
            'title' => 'Profil Admin'
        ]);
    }

    public function profil_admin(Request $request, User $user)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
            'email' =>  'Format :attribute salah!'
        ]);

        if (Hash::check($request->password_lama, auth()->user()->password)) {

            if (isset($request->password_baru)) {
                User::where($user->id)->update([
                    'password' => bcrypt($request->password_baru)
                ]);
            }

            User::where($user->id)->update($validateData);

            return redirect('/admin/profil-admin')->with([
                'name' => 'notification',
                'title' => 'Data berhasil diedit!',
                'icon' => 'success',
                'time' => '2100'
            ]);
        }

        $message = 'Password Salah!' . '<br>' . 'Data gagal diedit!';
        return redirect('/admin/profil-admin')->with([
            'name' => 'notification',
            'title' => $message,
            'icon' => 'error',
            'time' => '2500'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with([
            'name' => 'notification',
            'title' => 'Logout Sukses!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
