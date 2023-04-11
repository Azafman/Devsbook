<x-estrutura quantidadeAmigos="{{ $quantidadeAmigos ?? 2 }}" name="{{ $name ?? '' }}" 
selectPage="amigos" pathImage="{{$fotoPerfil}}">
    @slot('bodyFeed')
        <section class="feed">
            <x-profile.header-profile pathImage="{{$fotoPerfil}}"/>

            <x-profile.box-amigos />
        </section>
    @endslot
</x-estrutura>