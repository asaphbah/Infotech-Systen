@extends('layouts')

@section('content')

<section class="project">
 
        <ul class="project-list">
            @foreach ($projects as $project)
                <li class="project-item">
                   <div class="project-data">
                    <h2>
                        {{$project->title}}
                    </h2>
                    <p>{{$project->user->name}}</p>
                   </div>
                    <div class="icons">
                        <a href="{{route('tasks',['id' => $project->id])}}">
                            <i class="fas fa-eye" title="Ver Projeto"></i>
                        </a>
                        <p>numero de tarefas:{{$project->tasks->count()}}</p>
                    </div>
                </li>
            @endforeach
           
        </ul>
        
   
</section>
@endsection
