{{-- @dd($myPosts) --}}
<x-estrutura quantidadeAmigos="{{ $relations[1]}}" name="{{ $user['name'] ?? '' }}" selectPage="my-person"
    pathImage="{{ $fotoPerfil }}">
    @slot('bodyFeed')
        <section class="feed" style="position: relative;">
            <x-profile.header-profile pathImage="{{ $fotoPerfil }}" name="{{ $user['name'] }}"
                city="{{ $user['cidade'] ?? 'Nenhuma cidade' }}" :relations="$relations"  
                idOfThisUser="{{ $user['id'] }}"
                pathCover="{{$fotoCover ?? 'media/covers/cover.png'}}"/>

        <x-profile.box-profile pathImage="{{ $fotoPerfil }}" :posts="$myPosts"  :user="$user"/>
        </section>
    @endslot
</x-estrutura>
