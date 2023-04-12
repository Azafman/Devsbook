
<x-estrutura quantidadeAmigos="{{ $quantidadeAmigos }}" name="{{$user['name']}}" pathImage="{{$fotoPerfil}}">

    @slot('bodyFeed')
        <x-body-feed :posts="$posts" pathImage="{{$fotoPerfil}}"/>
    @endslot

</x-estrutura>
