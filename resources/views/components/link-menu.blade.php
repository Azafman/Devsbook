<a href="{{$link}}">
    <div class="menu-item {{$class2 ?? ''}}">
        <div class="menu-item-icon">
            <img src="assets/images/{{$img}}.png" width="16" height="16" />
        </div>
        <div class="menu-item-text">
            {{$text}}
        </div>
        {{$quantidadeAmigos ?? ''}}
    </div>
</a>
{{$barra ?? ''}}