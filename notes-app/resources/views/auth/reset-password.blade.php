@extends('layouts.app')

@section('content')
    <section class="form_pg">
        <div class="form_left">
            <h1 class="title">Redefinir senha</h1>
            <p class="subtitle">Digite sua nova senha para recuperar o acesso à sua conta de forma segura.</p>
        </div>
        
        <div class="form_right">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                
                <input type="hidden" name="token" value="{{ $token }}" />
                
                @error('email')
                    <p class="field_error">{{ $message }}</p>
                @enderror
                <input type="email" name="email" placeholder="Seu e-mail" value="{{ old('email', request('email')) }}" class="@error('email') field_error @enderror" required />
                
                @error('password')
                    <p class="field_error">{{ $message }}</p>
                @enderror
                <input type="password" name="password" placeholder="Nova senha" class="@error('password') field_error @enderror" required />
                
                @error('password_confirmation')
                    <p class="field_error">{{ $message }}</p>
                @enderror
                <input type="password" name="password_confirmation" placeholder="Confirmar nova senha" class="@error('password_confirmation') field_error @enderror" required />

                <x-button class='btn_fullwidth' linkto='password.update'>
                    Redefinir senha
                </x-button>

                @if (session('status'))
                    <span class="txt_success">{{ session('status') }}</span>
                @endif
            </form>
        </div>
    </section>
@endsection