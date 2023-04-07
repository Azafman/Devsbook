<div class="row">

    <div class="column">
        
        <div class="box">
            <div class="box-body">
                <div class="full-user-photos">
                    @for ($contador = 1; $contador < 7; $contador++)
                        <x-profile.fotos.foto-item contador={{$contador}}/>
                    @endfor
                </div>
            </div>
        </div>

    </div>
    
</div>