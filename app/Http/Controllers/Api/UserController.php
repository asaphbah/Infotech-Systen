<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users(){
        $users = User::all(); 
      return response()->json([
        'users' => $users
      ]);
    }
    public function authApi(Request $request){
        $credentials = $request->only('email','password');
        if( Auth::attempt($credentials)){
            $user = $request->user();
            
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]);
        }
    }
    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', 
            'password' => 'required|string|min:8|confirmed', 
            'adm' => 'sometimes|required|boolean', 
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'adm' => $validatedData['adm'],
        ]);

        return response()->json(['message' => 'Usuário criado com sucesso!', 'user' => $user], 201);
    }

    public function update(Request $request, $id)
    {
        
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado.'], 404);
        }
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id, 
            'password' => 'sometimes|nullable|string|min:8|confirmed', 
            'adm' => 'sometimes|required|boolean', 
        ]);
    
        
        $user->name = $validatedData['name'] ?? $user->name;
        $user->email = $validatedData['email'] ?? $user->email;
    
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
    
        $user->adm = $validatedData['adm'] ?? $user->adm;
        $user->save();
    
        return response()->json(['message' => 'Usuário atualizado com sucesso!', 'user' => $user], 200);
    }
    
}
