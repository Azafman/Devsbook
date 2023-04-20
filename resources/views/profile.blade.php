{{-- @php
    dd($myPosts);
@endphp --}}
<x-estrutura quantidadeAmigos="{{ $quantidadeAmigos ?? 2 }}" name="{{ $user['name'] ?? '' }}" selectPage="my-person"
    pathImage="{{ $fotoPerfil }}">
    @slot('bodyFeed')
        <section class="feed" style="position: relative;">
            <x-profile.header-profile pathImage="{{ $fotoPerfil }}" name="{{ $user['name'] }}"
                city="{{ $user['cidade'] ?? 'Nenhuma cidade' }}" :relations="$relations"  
                idOfThisUser="{{ $user['id'] }}"
                pathCover="{{$fotoCover ?? 'media/covers/cover.png'}}"/>

            <x-profile.box-profile pathImage="{{ $fotoPerfil }}" :posts="$myPosts"/>
        </section>
    @endslot
</x-estrutura>
