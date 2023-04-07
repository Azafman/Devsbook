<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/login.css">

    <title>Login</title>
</head>
<body>
    <header>
        <div class="container">
            <a href="/"><img src="assets/images/devsbook_logo.png" /></a>
        </div>
    </header>
    {{-- <x-form.container-form msg="Não tem conta ? Crie Aqui" auth="/register" acao="Entrar"/> --}}
    <section class="container main">
        <form method="POST" action="{{route('loginAction')}}">
            @csrf
    
            <x-form.input type="email" place="Digite seu e-mail" name="email" class1="input"/>
            
            <x-form.input type="password" place="Digite sua senha" name="password" class1="input"/>
    
            <x-form.acessar auth="Logar"/>
    
            <a href="{{route('register')}}">Não tem Conta ? Registre-se </a>
        </form>
    </section>
</body>
</html>
