<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Response;
// use Dotenv\Exception\ValidationException;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)){
            return response(['The provided credentials are incorrect.']);
        }
        return response([
            'token' => $user->createToken($user->name)->plainTextToken,
            'login qilindi',
        ]);

    }

      



        public function register(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'role' => 'in:admin,company',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role ?? 'company',
        'company_id' => $request->company_id 
    ]);

    $token = $user->createToken($user->name)->plainTextToken;

    return response([
        'user' => $user,
        'token' => $token
    ]);


}
public function logout(Request $request)
{
    $request->user()->tokens()->delete();
    return response()->json(['message' => 'Successfully logged out']);
}


}

