<x-estrutura quantidadeAmigos="{{ $relations[1] }}" name="{{$user['name']}}"  selectPage="fotos" pathImage="{{$fotoPerfil}}">
    @slot('bodyFeed')
        <section class="feed">
            <x-profile.header-profile 
            pathImage="{{$fotoPerfil}}"
            name="{{$user['name']}}" 
            city="{{$user['cidade'] ?? 'Nenhuma cidade'}}"
            :relations="$relations"
            idOfThisUser="{{ $user['id'] }}"
            pathCover="{{$fotoCover ?? 'media/covers/cover.png'}}"/>

            <x-profile.fotos.box-fotos />
        </section>
    @endslot
</x-estrutura>