<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/login.css">

    <title>Cadastra-se</title>
</head>
<body>
    <x-login-main/>
    <section class="container main">
        <form method="POST" action="{{route('registerAction')}}">
            @csrf
            @if ($errors->any()){{-- se tiver algum erro --}}
                <ul class="alert alert-error">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <x-form.input type="text" place="Digite seu nome" name="name" class1="input"/>
    
            <x-form.input type="email" place="Digite seu e-mail" name="email" class1="input"/>
            
            <x-form.input type="password" place="Digite sua senha" name="password" class1="input"/>
            
            <x-form.input type="password" place="Confirme sua senha" name="password_confirmation" class1="input"/>
            
            <x-form.acessar auth="Criar Conta"/>
    
            <a href="{{route('login')}}">Já tem Conta ? Entre aqui</a>
    </section>
</body>
</html>