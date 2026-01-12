<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Login</title>
</head>
<body>
    <h1>Recuperação de Senha</h1>
    <div>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div> 
    <form method="POST" action="{{route('password.update')}}">
        @csrf
        
        <input type="hidden" name="token" value="{{$token}}" />
        
        <div>
            <label>Email:</label>
            <input type="email" name="email" placeholder="Email" />
        </div>
        <div>
            <label>Nova senha:</label>
            <input type="password" name="password" placeholder="Nova senha" />
        </div>
        <div>
            <label>Confirmar nova senha:</label>
            <input type="password" name="password_confirmation" placeholder="Confirmar nova senha" />
        </div>
        <div>
            <button type="submit">Salvar</button>
        </div>
    </form>
</body>
</html>