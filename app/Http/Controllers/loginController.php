<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Mascota;
use App\Models\Cita;
use App\Models\User;

class loginController extends Controller
{
    //
    public function register(Request $request){
        $user = new User();
        $user->documento_cliente = $request->documento_cliente;
        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->email = $request->email;
        $user->celular = $request->celular;
        $user->password = Hash::make($request->password);

        $user->save();
        Auth::login($user);
        return redirect(route('home'));
    }

    public function login(Request $request){
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }else{
            return redirect('login');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
        }
}
