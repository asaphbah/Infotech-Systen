@extends('layouts')

@section('content')
    <div class="form-container">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Título da Tarefa</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" id="description" name="description" required>
            </div>
            <div class="form-group">
                <label for="responsible_id">responsavel</label>
                <select id="responsible_id" name="responsible_id" required>
                    <option value="">Selecione o responsavel</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
                <input type="hidden" id="project_id" name="project_id" value="{{$project->id}}" required>
            <div class="form-actions">
                <button type="submit">Cadastrar Tarefa</button>
                <a href="{{route('projects')}}">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
