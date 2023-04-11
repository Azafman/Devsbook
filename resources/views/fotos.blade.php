<x-estrutura quantidadeAmigos="{{ $quantidadeAmigos ?? 2 }}" name="{{ $name ?? '' }}" selectPage="fotos" pathImage="{{$fotoPerfil}}">
    @slot('bodyFeed')
        <section class="feed">
            <x-profile.header-profile pathImage="{{$fotoPerfil}}"/>

            <x-profile.fotos.box-fotos />
        </section>
    @endslot
</x-estrutura>