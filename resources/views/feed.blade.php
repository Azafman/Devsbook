
<x-estrutura quantidadeAmigos="{{ $quantidadeAmigos }}" name="{{$user['name']}}" pathImage="{{$fotoPerfil}}">

    @slot('bodyFeed')
        <x-body-feed :posts="$posts" />
    @endslot

</x-estrutura>
