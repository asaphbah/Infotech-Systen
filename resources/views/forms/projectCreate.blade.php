@extends('layouts')

@section('content')
    <div class="form-container">
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Título do Projeto</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" id="description" name="description" required>
            </div>
            <div class="form-group">
                <label for="start_date">Data de Início</label>
                <input type="date" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">Data de Término</label>
                <input type="date" id="end_date" name="end_date" required>
            </div>
            <div class="form-group">
                <label for="client_id">Cliente</label>
                <select id="client_id" name="client_id" required>
                    <option value="">Selecione um cliente</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-actions">
                <button type="submit">Cadastrar Projeto</button>
                <a href="{{ route('projects') }}">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
