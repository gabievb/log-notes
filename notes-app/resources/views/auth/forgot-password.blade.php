@extends('layouts.app')

@section('content')
    <section class="form_pg">
        <div class="form_left">
            <h1 class="title">Esqueceu sua senha?</h1>
            <p class="subtitle">Digite seu e-mail para receber um link de recuperação de senha e acessar novamente sua conta.</p>
        </div>
        
        <div class="form_right">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                
                @error('email')
                    <p class="field_error">{{ $message }}</p>
                @enderror
                <input type="email" name="email" placeholder="Seu e-mail" value="{{ old('email') }}" class="@error('email') field_error @enderror" required />

                <x-button class='btn_fullwidth' linkto='password.email'>
                    Enviar link de recuperação
                </x-button>

                @if (session('status'))
                    <span class="txt_success">{{ session('status') }}</span>
                @endif
            </form>
        </div>
    </section>
@endsection