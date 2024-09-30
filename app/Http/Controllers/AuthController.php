<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
  use App\Models\Association;
class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }
  
public function registerSave(Request $request)
{
    Validator::make($request->all(), [
        'name' => 'required',
        'no_hp' => 'required',
        'tanggal_lahir' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
        'nom_association' => 'required', // Validation pour le nom de l'association
    ])->validate();

    // Créer l'association
    $association = Association::create([
        'nom' => $request->nom_association,
       
    ]);

    // Créer l'utilisateur
    $user = User::create([
        'name' => $request->name,
        'no_hp' => $request->no_hp,
        'tanggal_lahir' => $request->tanggal_lahir,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'association_id' => $association->id, // Associer l'utilisateur à l'association
        'role' => 'customer',
    ]);

    return redirect()->route('login');
}

    public function login()
    {
        return view('auth/login');
    }
  
    public function loginAction(Request $request)
{
    Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required'
    ])->validate();

    if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
        $user = Auth::user();

        if ($user) {
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'customer') {
                return redirect()->route('customer.dashboard');
            } elseif ($user->role === 'restaurant') {
                return redirect()->route('restaurant.dashboard');
            }            
        }

 
        return redirect()->route('dashboard');
    }


    throw ValidationException::withMessages([
        'email' => trans('auth.failed')
    ]);
}
  

public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }



}