
<section class="feed mt-10">
    <div class="row general">
        <div class="column pr-5">
            <div class="box feed-new">
                <div class="box-body">
                    <div class="feed-new-editor m-10 row">
                        <div class="feed-new-avatar">
                            <img src="media/avatars/avatar.jpg" />
                        </div>
                        <div class="feed-new-input-placeholder">O que você está pensando, Bonieky?</div>
                        <div class="feed-new-input" contenteditable="true"></div>
                        <div class="feed-new-send">
                            <img src="assets/images/send.png" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- escreva um novo post --}}
            @foreach ($posts as $post)
                {{-- feed --}}
                <x-posts postAuthor="{{ $post[1] }}" bodyPost="{{ $post[2] }}" />
            @endforeach


            {{-- barra lateral abaixo --}}
        </div>
        <div class="column side pl-5">
            <div class="box banners">
                <div class="box-header">
                    <div class="box-header-text">Patrocinios</div>
                    <div class="box-header-buttons">

                    </div>
                </div>
                <div class="box-body">
                    <a href=""><img src="https://alunos.b7web.com.br/media/courses/php-nivel-1.jpg" /></a>
                    <a href=""><img src="https://alunos.b7web.com.br/media/courses/laravel-nivel-1.jpg" /></a>
                </div>
            </div>
            <div class="box">
                <div class="box-body m-10">
                    Criado com ❤️ por B7Web
                </div>
            </div>
        </div>
    </div>
</section>
