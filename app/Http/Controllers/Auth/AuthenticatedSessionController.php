<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();


        if(auth()->user()){
            $id = auth()->user()->staff_id;
            $user = User::where('staff_id',$id)->first();

            if ($user) {
                $user->activity = 'online';
                $user->save();
            }
        }

        $token = $user->createToken('authToken')->plainTextToken;

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME)
                        ->with('token', $token);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {

        if(auth()->user()){
            $id = auth()->user()->staff_id;
            $user = User::where('staff_id',$id)->first();

            if ($user) {
                $user->tokens()->delete();
                $user->last_activity = now(); 
                $user->activity = 'Offline';
                $user->save();
                

                Auth::guard('web')->logout();

                $request->session()->invalidate();
        
                $request->session()->regenerateToken();
        
                return redirect('/');

            }
        }

    
    }
}
