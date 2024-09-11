@extends('layouts')

@section('content')
    <div class="form-container">
        <form method="POST" action="{{route('auth')}}">
            @csrf
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required >
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-actions">
                <button type="submit">Entrar</button>
                <a href="{{route('user.create')}}">Cadastrar-se</a>
            </div>
        </form>
    </div>
@endsection
