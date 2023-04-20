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
                    <x-profile.fotos.foto-item contador="{{ $contador }}" />
                @endfor
            </div>
        </div>

        @for ($cont = 0; $cont < count($posts); $cont++)
            @php
                try {
                    try {
                        $path = 'storage/images/' . $posts[$cont]['fotoPerfil'][0]['caminho_imagem'];
                    } catch (Exception $e) {
                        $path = 'storage/images/' . $posts[$cont]['fotoPerfil'][1]['caminho_imagem'];
                    }
                } catch (Exception $e) {
                    $path = null;
                }
            @endphp
            <x-posts postAuthor="{{ $posts[$cont]['author']['name'] ?? '' }}"
                bodyPost="{{ $posts[$cont]['body'] ?? '' }}" :postComent="$posts[$cont]['coments'] ?? ''" :postLikes="$posts[$cont]['likes'] ?? ''"
                postData="{{ $posts[$cont]['created_at'] }}"
                pathFotoPerfil="{{$path}}" />
        @endfor
    </div>

</div>
