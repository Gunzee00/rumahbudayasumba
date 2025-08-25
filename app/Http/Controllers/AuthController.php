<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Footer;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::attempt([
        'username' => $request->username,
        'password' => $request->password
    ])) {
        $request->session()->regenerate();

        // Ambil user yang login
        $user = Auth::user();

        // Kalau admin → ke admin dashboard
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Kalau user biasa → ke halaman utama /
        return redirect()->route('user.home'); 
        // atau langsung return redirect('/');
    }

    return back()->withErrors([
        'username' => 'Username atau password salah.',
    ])->onlyInput('username');
}


    /**
     * Show register form (untuk user)
     */
    public function showRegisterForm()
    {
        return view('user.register'); // 👈 sesuai permintaan
    }

    /**
     * Handle register request (role = user)
     */
    public function register(Request $request)
    {
        $request->validate([
            'username'              => 'required|string|max:255|unique:users,username',
            'password'              => 'required|string|min:6|confirmed', // cek dengan password_confirmation
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => 'user', // 👈 default user
        ]);

        Auth::login($user);
        return redirect('/'); // arahkan ke dashboard user
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function logoutUser(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/'); // 👈 setelah logout langsung ke halaman root
}

    public function profileUser()
    {
        $user = Auth::user(); // ambil user yang sedang login
        $footer = Footer::first();  


        return view('user.profile', compact('user', 'footer'));
    }
}
