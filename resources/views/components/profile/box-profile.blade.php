<div class="row">

    <div class="column side pr-5">

        <div class="box">
            <div class="box-body">
                <x-profile.perfil.informacao txt="01/01/1930 (90 anos)" img="calendar" />
                <x-profile.perfil.informacao txt="Campina Grande, Brasil" img="pin" />
                <x-profile.perfil.informacao txt="B7Web" img="work" />

            </div>
        </div>

        <div class="box">
            <div class="box-header m-10">
                <div class="box-header-text">
                    Seguindo
                    <span>(363)</span>
                </div>
                <div class="box-header-buttons">
                    <a href="">ver todos</a>
                </div>
            </div>
            <div class="box-body friend-list">
                <x-profile.perfil.icone />
                <x-profile.perfil.icone />
                <x-profile.perfil.icone />
            </div>
        </div>
    </div>

    <div class="column pl-5">

        <div class="box">
            <div class="box-header m-10">
                <div class="box-header-text">
                    Fotos
                    <span>(12)</span>
                </div>
                <div class="box-header-buttons">
                    <a href="">ver todos</a>
                </div>
            </div>
            <div class="box-body row m-20">
                @for ($contador = 1; $contador < 5; $contador++)
                    <x-profile.fotos.foto-item contador="{{$contador}}"/>
                @endfor
            </div>
        </div>

        <div class="box feed-item">

            <div class="box-body">
                <div class="feed-item-head row mt-20 m-width-20">
                    <div class="feed-item-head-photo">
                        <a href=""><img src="{{asset('media/avatars/avatar.jpg')}}" /></a>
                    </div>
                    <div class="feed-item-head-info">
                        <a href=""><span class="fidi-name">Mateus Azaf</span></a>
                        <span class="fidi-action">fez um post</span>
                        <br />
                        <span class="fidi-date">07/03/2020</span>
                    </div>
                    <div class="feed-item-head-btn">
                        <img src="{{asset('assets/images/more.png')}}" />
                    </div>
                </div>
                <div class="feed-item-body mt-10 m-width-20">
                    
                </div>
                <div class="feed-item-buttons row mt-20 m-width-20">
                    <div class="like-btn on">56</div>
                    <div class="msg-btn">3</div>
                </div>
                <div class="feed-item-comments">

                    <div class="fic-item row m-height-10 m-width-20">
                        <div class="fic-item-photo">
                            <a href=""><img src="{{asset('media/avatars/avatar.jpg')}}" /></a>
                        </div>
                        <div class="fic-item-info">
                            <a href="">Bonieky Lacerda</a>
                            Comentando no meu próprio post
                        </div>
                    </div>

                    <div class="fic-item row m-height-10 m-width-20">
                        <div class="fic-item-photo">
                            <a href=""><img src="{{asset('media/avatars/avatar.jpg')}}" /></a>
                        </div>
                        <div class="fic-item-info">
                            <a href="">Bonieky Lacerda</a>
                            Muito legal, parabéns!
                        </div>
                    </div>

                    <div class="fic-answer row m-height-10 m-width-20">
                        <div class="fic-item-photo">
                            <a href=""><img src="{{asset('media/avatars/avatar.jpg')}}" /></a>
                        </div>
                        <input type="text" class="fic-item-field" placeholder="Escreva um comentário" />
                    </div>

                </div>
            </div>
            
        </div>
    </div>

</div>