<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'E-mail ou senha inválidos'
            ]);
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // Redireciona conforme o perfil real do usuário no banco
        if (in_array($user->role, ['admin', 'jornalista'])) {
            return redirect()->route('jornalista.dashboard');
        }

        return redirect()->route('user.dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}