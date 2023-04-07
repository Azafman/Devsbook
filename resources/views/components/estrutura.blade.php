<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Devsbook - Início</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" data-link="none"/>
    <link rel="stylesheet" href="{{asset('assets/css/my-style.css')}}" data-link="none"/>
    
</head>
<body>
    <x-header-all-pages nameUser="{{ $name ?? 'nome provisório' }}"/>
    <section class="container main">
        <aside class="mt-10">
            <nav>
                <x-link-menu link="{{route('home')}}" class2="active" img="home-run" text="Home" />

                <x-link-menu link="{{route('profile')}}" img="user" text="Meu Perfil" />

                <x-link-menu link="{{route('friends')}}" img="friends" text="Amigos">
                    @slot('quantidadeAmigos')
                        <div class="menu-item-badge">
                            {{ $quantidadeAmigos }}
                        </div>
                    @endslot
                </x-link-menu>

                <x-link-menu link="{{route('photos')}}" img="photo" text="Fotos">
                    @slot('barra')
                        <div class='menu-splitter'></div>
                    @endslot
                </x-link-menu>


                <a href="{{route('configAcount')}}">
                    <div class="menu-item">
                        <div class="menu-item-icon">
                            <img src="{{asset('assets/images/settings.png')}}" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Configurações
                        </div>
                    </div>
                </a>
                <a href="{{route('logoutUser')}}">
                    <div class="menu-item">
                        <div class="menu-item-icon">
                            <img src="{{asset('assets/images/power.png')}}" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Sair
                        </div>
                    </div>
                </a>ex
            </nav>
        </aside>
        {{$bodyFeed ?? ''}}
    </section>
    <div class="modal">
        <div class="modal-inner">
            <a rel="modal:close">&times;</a>
            <div class="modal-content"></div>
        </div>
    </div>
    {{-- <script type="text/javascript" src="assets/js/script.js"></script>
    <script type="text/javascript" src="assets/js/vanillaModal.js"></script> --}}
    <script type="text/javascript" src="{{asset('assets/js/select-page.js')}}"></script>
</body>
</html>