
<x-estrutura quantidadeAmigos="{{ $quantidadeAmigos }}" name="{{$name}}">

    @slot('bodyFeed')
        <x-body-feed :posts="$posts" />
    @endslot

</x-estrutura>
