<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function home(Project $project){
        $projects = Project::all();
        return view('screens.projects.projects', compact('projects'));
    }
    public function create(){
        $users = User::all();
        return view('forms.projectCreate', compact('users'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'client_id' => 'required|exists:users,id',
        ]);
    
        Project::create($validatedData);
    
        return redirect()->route('projects');
    }
    public function edit($id){
        $users = User::all();
        $project = Project::find($id);
        return view('forms.projectEdit', compact('project', 'users'));
    }
 public function update(Request $request, $id){
      
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'client_id' => 'required|exists:users,id',
        ]);

        $project = Project::findOrFail($id);

        $project->update($validatedData);

        return redirect()->route('projects')->with('success', 'Projeto atualizado com sucesso!');
    }
    public function destroy($id){
        $project = Project::findOrFail($id);

        $project->delete();

        return redirect()->route('projects');
    }
}
