@php
    //dd($posts[0]);
@endphp
<x-estrutura quantidadeAmigos="{{ $quantidadeAmigos }}">

    @slot('bodyFeed')
        <x-body-feed :posts="$posts" />
    @endslot

</x-estrutura>
