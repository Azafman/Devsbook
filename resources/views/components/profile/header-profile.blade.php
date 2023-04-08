<div class="row">
    <div class="box flex-1 border-top-flat">
        <div class="box-body">
            <div class="profile-cover" style="background-image: url({{asset('media/covers/cover.jpg')}});"></div>
            <div class="profile-info m-20 row">
                <div class="profile-info-avatar profile-foto">
                    <img src="{{asset('media/avatars/avatar.jpg')}}" />
                </div>
                <div class="profile-info-name">
                    <div class="profile-info-name-text">Bonieky Lacerda</div>
                    <div class="profile-info-location">Campina Grande</div>
                </div>
                <div class="profile-info-data row">
                    <div class="profile-info-item m-width-20">
                        <div class="profile-info-item-n">129</div>
                        <div class="profile-info-item-s">Seguidores</div>
                    </div>
                    <div class="profile-info-item m-width-20">
                        <div class="profile-info-item-n">363</div>
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
        <form action="" method="POST" >
            <h3>Atualize sua Foto</h3>
            <p>
                Coloque sua foto de Perfil aqui: <br>
            </p>
            <input type="file" name="" id="" class="image">
            <div class="finsh">
                <input type="submit" value="Enviar" class="image" id="submit-img">
                <button type="button" class="image changeState" >Fechar</button>
            </div>
        </form>
    </div>
</div>