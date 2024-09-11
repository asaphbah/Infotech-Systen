@extends('layouts')
<style>

</style>
@section('content')
    <section class="sec-tasks"> 
        <div class="project-data-cont">
            <h2>{{$project->title}}</h2>
            <div>
                <p><b>Descrição:</b> {{$project->description}}</p>
                <p><b>Nome do responsavel: </b> {{$project->user->name}}</p>
                <p><b>Numero de tasks: </b>{{$project->tasks->count()}}</p>
                <p><b>Inicio do projeto: </b>{{$project->start_date}}</p>
                <p><b>Prazo:</b> {{$project->end_date}}</p>
            </div>
            <div class="task-item-btns">
              @if (Auth::user()->adm == true || $project->responsible_id == Auth::user()->id)
                <button class="">
                    <a href="{{route('tasks.create',['id'=>$project->id])}}">
                        <i class="fas fa-plus" title="Adicionar Projeto"></i>
                    </a>
                </button>
                <button class="">
                    <a href="{{route('projects.destroy',['id'=>$project->id])}}">
                        <i class="fas fa-trash" title="Apagar Projeto"></i>
                    </a>
                </button>
              @endif
               
            </div>
        </div>  
        <div class="tasks-cont">
            <ul class="tasks-list">
                @foreach ( $project->tasks as $task )
                    <li class="tasks-item">
                        <div class="task-item-cont">
                            <h3>{{$task->title}}</h3>
                            <p><b>Nome do responsavel: </b><a class="link-user" href="{{route('user.view', ['id' => $task->responsible_id])}}">{{$task->user->name}}</a></p>
                            <p>@if ($task->status == false)
                                <b>Em andamento</b>
                            @else
                                <b>Conluida</b>
                            @endif
                        </p>
                        </div>
                     <div class="task-item-btns">
                        <button title="Visualizar">
                           <a href="{{route('tasks.view',['id' => $task->id] )}}">
                            <i class="fas fa-eye"></i>
                           </a>
                        </button>
                        @if ($task->responsible_id == Auth::user()->id)
                            <button title="Editar">
                                <a href="{{route('tasks.edit',['id' => $task->id] )}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </button>
                        @endif
                        @if (Auth::user()->adm == true)
                        <button title="Apagar">
                            <a href="{{route('tasks.destroy',['id' => $task->id] )}}">
                                <i class="fas fa-trash"></i>
                            </a>
                            </button>
                        @endif
                     </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection