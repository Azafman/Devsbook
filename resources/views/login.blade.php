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
    <x-login-main/>
    {{-- <x-form.container-form msg="Não tem conta ? Crie Aqui" auth="/register" acao="Entrar"/> --}}
    <section class="container main">
        <form method="POST">
    
            <x-form.input type="email" place="Digite seu e-mail" name="email" class1="input"/>
            
            <x-form.input type="password" place="Digite sua senha" name="password" class1="input"/>
    
            <x-form.acessar auth="Logar"/>
    
            <a href="/register">Não tem Conta ? Registre-se </a>
        </form>
    </section>
</body>
</html>
