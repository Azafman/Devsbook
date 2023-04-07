<x-estrutura quantidadeAmigos="{{ $quantidadeAmigos ?? 2 }}" name="{{ $name ?? '' }}" selectPage="fotos">
    @slot('bodyFeed')
        <section class="feed">
            <x-profile.header-profile />

            <x-profile.fotos.box-fotos />
        </section>
    @endslot
</x-estrutura>