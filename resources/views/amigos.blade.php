<x-estrutura quantidadeAmigos="{{ $quantidadeAmigos ?? 2 }}" name="{{ $name ?? '' }}" 
selectPage="amigos">
    @slot('bodyFeed')
        <section class="feed">
            <x-profile.header-profile />

            <x-profile.box-amigos />
        </section>
    @endslot
</x-estrutura>