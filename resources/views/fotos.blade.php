<x-estrutura quantidadeAmigos="{{ $quantidadeAmigos ?? 2 }}" name="{{$user['name']}}"  selectPage="fotos" pathImage="{{$fotoPerfil}}">
    @slot('bodyFeed')
        <section class="feed">
            <x-profile.header-profile 
            pathImage="{{$fotoPerfil}}"
            name="{{$user['name']}}" 
            city="{{$user['cidade'] ?? 'Nenhuma cidade'}}"/>

            <x-profile.fotos.box-fotos />
        </section>
    @endslot
</x-estrutura>