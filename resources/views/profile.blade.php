<x-estrutura quantidadeAmigos="{{ $quantidadeAmigos ?? 2 }}" name="{{ $name ?? '' }}" 
selectPage="my-person">
    @slot('bodyFeed')
        <section class="feed">
            <x-profile.header-profile />

            <x-profile.box-profile />
        </section>
    @endslot
</x-estrutura>