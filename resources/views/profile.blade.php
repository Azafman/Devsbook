<x-estrutura quantidadeAmigos="{{ $quantidadeAmigos ?? 2 }}" name="{{ $name ?? '' }}" 
selectPage="my-person">
    @slot('bodyFeed')
        <section class="feed" style="position: relative;">
            <x-profile.header-profile />

            <x-profile.box-profile />
        </section>
    @endslot
</x-estrutura>
<script src="{{asset('assets/js/upload-img.js')}}"></script>