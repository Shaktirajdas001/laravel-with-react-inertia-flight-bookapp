<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'user_type'=> 'user',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        

        event(new Registered($user));

        Auth::login($user);
        // $user_type = Auth::user()->user_type;
        // if($user_type == "admin")
        // {
        //     return redirect()->intended(route('bookings.index', absolute: false));

        // }
        // else{
        //     return redirect()->intended(route('userdashboard', absolute: false));
        // }
        $user_type = Auth::user()->user_type;
        return redirect()->intended(route('dashboard', absolute: false));
    }
}
