<x-estrutura quantidadeAmigos="{{ $quantidadeAmigos ?? 2 }}" name="{{$user['name']}}"  
selectPage="amigos" pathImage="{{$fotoPerfil}}">
    @slot('bodyFeed')
        <section class="feed">
            <x-profile.header-profile 
            pathImage="{{$fotoPerfil}}" 
            name="{{$user['name']}}" 
            city="{{$user['cidade'] ?? 'Nenhuma cidade'}}"
            :relations="$relations"/>

            <x-profile.box-amigos />
        </section>
    @endslot
</x-estrutura>