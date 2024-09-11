@extends('layouts')

@section('content')
    <div class="sec-task">
        <h2>Perfil do Usuário</h2>
        <div class="task-details">
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
        
            <div class="task-actions">
                @if (Auth::user()->id == $user->id )
                <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn">Editar Perfil</a>
                @endif
                @if (Auth::user()->adm == true )
                <a href="{{ route('user.destroy', ['id' => $user->id]) }}" class="btn">Deletar Perfil</a>
                @endif
                
            </div>
       
        <div class="task-back">
            <a href="{{ route('projects') }}">Voltar aos Projetos</a>
        </div>
    </div>
@endsection
