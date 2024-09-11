<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('forms.userCreate');
    }
    public function store(Request $request){
      
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'adm' => 'required|boolean',
        ]);      
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'adm' => $validatedData['adm'],
            ]);
            
            return redirect()->route('login')->with('success', 'Usuário cadastrado com sucesso!');
      
        
    }
    public function destroy($id){
        $task = User::findOrFail($id);
        $task->delete();

        return redirect()->route('projects');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('forms.userEdit', compact('user'));
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::find($request->id);
        $user->update($validatedData);


        return redirect()->route('user.view',['id'=>$user->id]);
    }
    public function view($id)
    {
        $user = User::find($id);
        return view('screens.users.profile', compact('user'));
    }
}
