@extends('layouts')

@section('content')
    <div class="form-container">
        <form method="POST" action="{{ route('user.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="adm">Administrador</label>
                <select id="adm" name="adm" required>
                    <option value="0" {{ old('adm') == '0' ? 'selected' : '' }}>Não</option>
                    <option value="1" {{ old('adm') == '1' ? 'selected' : '' }}>Sim</option>
                </select>
                @error('adm')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-actions">
                <button type="submit">Cadastrar Usuário</button>
                <a href="{{ route('login') }}">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
