<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log Notes</title>
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
        @if(session()->has('status'))
            <div>{{session()->get('status')}}</div>
        @endif
    </div> 
    <form method="POST" action="{{route('password-email')}}">
        @csrf
        <div>
            <label>Email:</label>
            <input type="email" name="email" placeholder="Email" />
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
    </form>
</body>
</html>