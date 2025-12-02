<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Routes d'authentification de base
Route::get('login', function () {
    // Si l'utilisateur est déjà connecté, le rediriger vers le dashboard
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login');
})->name('login');

Route::post('login', function (Request $request) {
    // Valider les données du formulaire
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    
    // Tenter de connecter l'utilisateur
    if (Auth::attempt($credentials, $request->filled('remember'))) {
        // Regénérer la session pour éviter la fixation de session
        $request->session()->regenerate();
        
        // Rediriger vers le dashboard
        return redirect()->intended(route('dashboard'));
    }
    
    // En cas d'échec, rediriger avec une erreur
    return back()->withErrors([
        'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
    ])->withInput($request->only('email'));
})->name('login.post');

Route::get('register', function () {
    // Si l'utilisateur est déjà connecté, le rediriger vers le dashboard
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.register');
})->name('register');

Route::post('register', function (Request $request) {
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'terms' => ['required'],
    ]);
    
    // Créer l'utilisateur
    $user = \App\Models\User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => \Illuminate\Support\Facades\Hash::make($validatedData['password']),
    ]);
    
    // Connecter automatiquement l'utilisateur après l'inscription
    Auth::login($user);
    
    // Regénérer la session
    $request->session()->regenerate();
    
    // Rediriger vers le dashboard
    return redirect()->route('dashboard');
})->name('register.post');

Route::post('logout', function (Request $request) {
    // Déconnecter l'utilisateur
    Auth::logout();
    
    // Invalider la session
    $request->session()->invalidate();
    
    // Regénérer le jeton CSRF
    $request->session()->regenerateToken();
    
    // Rediriger vers la page d'accueil
    return redirect()->route('home');
})->name('logout');