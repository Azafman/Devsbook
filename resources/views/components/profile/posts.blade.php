@php
    use Carbon\Carbon;
@endphp
<div class="box feed-item psot-item item">

    <div class="feed-item-head row mt-20 m-width-20">
        <div class="feed-item-head-photo">
            <a href=""><img src="{{ asset($pathFotoPerfil ?? 'media/avatars/avatar.jpg') }}" /></a>
        </div>
        <div class="feed-item-head-info">
            <a href=""><span class="fidi-name">{{ $postAuthor ?? '' }}
                </span></a>
            <span class="fidi-action">fez um post</span>
            <br />
            <span class="fidi-date">
                @php
                    $carbonDate = Carbon::createFromDate($postData);
                    echo $carbonDate->format('d \d\e F \D\e Y');
                @endphp
            </span>
        </div>
        <div class="feed-item-head-btn">
            <img src="{{ asset('assets/images/more.png') }}" />
        </div>
    </div>
    <div class="feed-item-body mt-10 m-width-20 body-text">
        {{ $bodyPost ?? '' }}
    </div>
    <div class="feed-item-buttons row mt-20 m-width-20">
        <div class="like-btn on">{{ count($postLikes) }}</div>
        <div class="msg-btn">{{ count($postComent) }}</div>
    </div>
    <div class="feed-item-comments">
        {{ $post ?? '' }}
        @foreach ($postComent as $pst)
            <x-coment-post authorComent="{{ $pst['autorComent']['name'] }}" bodyComent="{{ $pst['body_coment'] }}" />
        @endforeach

        <div class="fic-answer row m-height-10  m-width-20 icn">
            <div class="fic-item-photo">
                <a href=""><img src="{{ asset($pathFotoPerfil ?? 'media/avatars/avatar.jpg') }}" /></a>
            </div>
            <input type="text" class="fic-item-field" placeholder="Escreva um comentário" />
        </div>

    </div>
</div>
</div>

</div>
