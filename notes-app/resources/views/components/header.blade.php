    <header>
        <div class="head_left">
            <a href="{{route('home')}}">
                <img src="{{asset('img/logo.png')}}" alt="Log Notes Logo" title="Log Notes Logo">
            </a>
        </div>

        <div class="head_right">
            @auth
                <div class="menu_profile">
                    <div class="user_picture">{{substr(auth()->user()->name, 0, 1)}}</div>
                
                    <nav>
                        <div class="user_infos">
                            <span>{{auth()->user()->name}}</span>
                        </div>
                        <ul>
                            <li>
                                <a href="#">Anotações</a>
                            </li>
                            <li>
                                <a href="{{route('logout')}}">Sair</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            @endauth

            @guest
                <x-button class='' linkto='create-account'>Criar conta</x-button>
                <x-button class='btn_login' linkto='login'>Login</x-button>
            @endguest
        </div>
    </header>