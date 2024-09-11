@extends('layouts')

@section('content')
    <div class="form-container">
        <form method="POST" action="{{route('tasks.update', ['id' => $task->id])}}">
            @csrf
            <div class="form-group">
                <label for="title">Título da Tarefa</label>
                <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" id="description" name="description" value="{{ old('description', $task->description) }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>Incompleta</option>
                    <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Completa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="responsible_id">Responsavel</label>
                <select id="responsible_id" name="responsible_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $task->responsible_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" id="project_id" name="project_id" value="{{ $task->project_id }}" required>
            <div class="form-actions">
                <button type="submit">Atualizar Tarefa</button>
                <a href="{{ route('projects') }}">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
