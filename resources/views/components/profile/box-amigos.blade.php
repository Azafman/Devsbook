<div class="row">
    <div class="column">
        <div class="box">
            <div class="box-body">

                <div class="tabs">
                    <div class="tab-item" data-for="followers">
                        Seguidores
                    </div>
                    <div class="tab-item active" data-for="following">
                        Seguindo
                    </div>
                </div>
                <div class="tab-content">
                    <div class="" data-item="followers">
                        <div class="full-friend-list">
                            @for ($contador = 0; $contador < 5; $contador++)
                                <x-profile.perfil.friend />
                            @endfor
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
