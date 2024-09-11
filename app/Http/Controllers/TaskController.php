<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function home($id){
        $project = Project::find($id);
        
        return view('screens.tasks.tasks', compact('project'));
    }
    public function create($id){
        $users = User::all();
        $project = Project::find($id);
        return view('forms.taskCreate', compact('project','users'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'responsible_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
        ]);
        $validatedData['status'] = false;
    
        Task::create($validatedData);
    
        return redirect()->route('tasks', ['id' => $request->project_id]);
    }
    
    public function edit($id){
        $users = User::all();
        $task = Task::find($id);
        return view('forms.taskEdit', compact('task','users'));
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|boolean',
           'responsible_id' => 'required|exists:users,id',
        ]);
        $task = Task::findOrFail($id);

        $task->update($validatedData);

        return redirect()->route('tasks', ['id' =>  $task->project_id]);
    }
    public function view($id){
        $task = Task::find($id);

        return view('screens.tasks.taskView', compact('task'));
    }
    public function destroy($id){
    
        $task = Task::findOrFail($id);
        $project_id = $task->project_id;
        $task->delete();

        return redirect()->route('tasks', ['id' =>  $project_id]);
    }
}
