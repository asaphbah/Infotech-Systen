@extends('layouts')
<style>

</style>
@section('content')
    <sec class="sec-task">
        <h2>Detalhes da Tarefa</h2>

        <div class="task-details">
            <p><strong>Título:</strong> {{ $task->title }}</p>
            <p><strong>Descrição:</strong> {{ $task->description }}</p>
            <p><strong>Status:</strong> {{ $task->status ? 'Completa' : 'Incompleta' }}</p>
            <p><strong>Cliente:</strong> {{ $task->user->name }}</p>
            <p><strong>Projeto:</strong> {{ $task->project->title }}</p>
        </div>

        @if  
            <div class="task-actions">
                <a href="{{ route('tasks.edit',['id' => $task->id]) }}">Editar</a>
                <a href="{{route('tasks.destroy',['id' => $task->id])}}">Deletar</a>
            </div>
        @endif

        <div class="task-back">
            <a href="{{ route('tasks', $task->project_id) }}">Voltar para o Projeto</a>
        </div>
    </sec>
@endsection
