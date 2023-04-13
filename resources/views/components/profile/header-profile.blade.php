
<div class="row">
    <div class="box flex-1 border-top-flat">
        <div class="box-body">
            <div class="profile-cover fundo cover-fundo" style="background-image: url({{asset('media/covers/cover.jpg')}});"></div>
            <div class="profile-info m-20 row">
                <div class="profile-info-avatar profile-foto fundo">
                    <img src="{{asset($pathImage)}}" />
                </div>
                <div class="profile-info-name">
                    <div class="profile-info-name-text">{{$name}}</div>
                    <div class="profile-info-location">{{$city}}</div>
                </div>
                <div class="profile-info-data row">
                    <div class="profile-info-item m-width-20">
                        <div class="profile-info-item-n">{{$relations[1]}}</div>
                        <div class="profile-info-item-s">Seguidores</div>
                    </div>
                    <div class="profile-info-item m-width-20">
                        <div class="profile-info-item-n">{{$relations[0]}}</div>
                        <div class="profile-info-item-s">Seguindo</div>
                    </div>
                    <div class="profile-info-item m-width-20">
                        <div class="profile-info-item-n">12</div>
                        <div class="profile-info-item-s">Fotos</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="upload-foto">
    <div class="form">
        <form action="{{route('upload-img')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>Atualize sua Foto</h3>
            <p>
                Coloque sua foto de Perfil aqui: <br>
            </p>
            <input type="file" name="image" id="" class="image">
            <input type="hidden" name="perfil-or-cover" value="undefined">
            <input type="hidden" name="idOfThisUser" value="{{$idOfThisUser}}">
            <div class="finsh">
                <input type="submit" value="Enviar" class="image" id="submit-img">
                <button type="button" class="image changeState" >Fechar</button>
                <button type="button" class="image changeState delete" >Deletar Foto</button>
            </div>
        </form>
    </div>
    <script>
        window.csrf_token = "{{csrf_token()}}";
    </script>
</div>
