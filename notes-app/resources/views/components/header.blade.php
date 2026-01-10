    <header>
        <div class="head_left">
            <img src="{{asset('img/logo.png')}}" alt="Log Notes Logo" title="Log Notes Logo">
        </div>

        <div class="head_right">
            @include('components.button', ['text' => 'Criar conta', 'class' => ''])
            @include('components.button', ['text' => 'Login', 'class' => 'btn_login'])
        </div>
    </header>