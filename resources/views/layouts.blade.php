<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>sad</title>
</head>
<body>
    <header>
        <div class="nav-body">
            <div>
                <h1>Gerenciamento</h1>
                <p>de tarefas</p>
            </div>
            @auth
                <button id="menu-toggle" class="btn-nav" onclick="toggleMenu()">
                    <i class="fas fa-bars"></i>
                </button>
            @endauth
            @guest
                <a href="{{route('login')}}" class="btn-login">
                    <p>Login</p>
                </a>
            @endguest
            <nav id="nav-menu">
                
                @auth
                    <ul class="nav-list">
                        <li>
                            <a href="{{route('projects.create')}}">Adicionar Projetos</a>
                        </li>
                        <li>
                            <a href="{{route('projects')}}">Projetos</a>
                        </li>
                        <li>
                            <a href="{{route('user.view', ['id' => Auth::user()->id])}}">Perfil</a>
                        </li>
                        <li>
                            <a href="{{route('logout')}}">Sair</a>
                        </li>
                    </ul>
                @endauth
            </nav>
        </div> 
    </header>
    <main>
        @yield('content')
    </main>   
    <script>
        function toggleMenu() {
            const navMenu = document.getElementById('nav-menu');

            if (window.getComputedStyle(navMenu).display === 'flex') {
                navMenu.style.display = 'none';
            } else {
                navMenu.style.display = 'flex';
            }
        }
    </script> 
</body>
</html>
