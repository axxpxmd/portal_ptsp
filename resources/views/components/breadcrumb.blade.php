@props(['items'])

<nav class="ui-breadcrumb" aria-label="breadcrumb">
    @foreach($items as $item)
        <div class="ui-breadcrumb-item">
            @if(!$loop->last)
                <a href="{{ $item['url'] }}" class="ui-breadcrumb-link">
                    @if($loop->first)
                        <i class="fa-solid fa-house"></i>
                    @endif
                    {{ $item['label'] }}
                </a>
                <i class="fa-solid fa-chevron-right ui-breadcrumb-sep"></i>
            @else
                <span class="ui-breadcrumb-current">{{ $item['label'] }}</span>
            @endif
        </div>
    @endforeach
</nav>
