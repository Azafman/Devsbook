
<x-estrutura quantidadeAmigos="{{ $relations[1] }}" name="{{$user['name']}}" pathImage="{{$fotoPerfil}}">

    @slot('bodyFeed')
        <x-body-feed :posts="$posts" pathImage="{{$fotoPerfil}}" fotoPerfil="{{$fotoPerfil}}"/>
    @endslot

</x-estrutura>
