@extends('layouts')

@section('content')
    <div class="sec-task">
        <h2>Editar Perfil</h2>
        <form action="{{ route('user.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <input type="hidden" name="id" value="{{Auth::user()->id}}">
            <div class="form-actions">
                <button type="submit">Atualizar Perfil</button>
                <a href="{{ route('user.view',['id' => $user->id]) }}" class="btn">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
