<main class="posts">
    <div class="item">
        <div class="feed-new-avatar itens">
            <img src="media/avatars/avatar.jpg" />
        </div>

        <div class="feed-new-input-placeholder itens">O que você está pensando, Bonieky?</div>

        <div class="feed-new-send itens">
            <img src="assets/images/send.png" />
        </div>

        <div class="feed-new-editor m-10 row itens">
            <div class="feed-new-input" contenteditable="true"></div>
        </div>
    </div>
    @for ($contador = 0; $contador < count($posts); $contador++)
        <x-posts postAuthor="{{ $posts[$contador]['author']['name'] }}" bodyPost="{{ $posts[$contador]['body'] }}"
            :postData="$posts[$contador]['created_at']" :postComent="$posts[$contador]['coments']" :postLikes="$posts[$contador]['likes']" />
    @endfor
</main>
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
            Criado com ❤️ por AZ4F MATEUS
        </div>
    </div>
</div>
