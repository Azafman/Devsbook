<header>
    <div class="container">
        <div class="logo">
            <a href="{{route('home')}}"><img src="{{asset('assets/images/devsbook_logo.png')}}" /></a>
        </div>
        <div class="head-side">
            <div class="head-side-left">
                <div class="search-area">
                    <form method="GET">
                        <input type="search" placeholder="Pesquisar" name="s" />
                    </form>
                </div>
            </div>
            <div class="head-side-right">
                <a href="{{route('profile')}}" class="user-area">
                    <div class="user-area-text">{{$nameUser}}</div>
                    <div class="user-area-icon">
                        <img src="{{asset('media/avatars/avatar.jpg')}}" />
                    </div>
                </a>
                <a href="{{route('logoutUser')}}" class="user-logout">
                    <img src="{{asset('assets/images/power_white.png')}}" />
                </a>
            </div>
        </div>
    </div>
</header>