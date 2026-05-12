@props([
    'items',
    'title' => null,
    'subtitle' => null,
    'bgImage' => null
])

<div class="ui-page-header" @if($bgImage) style="background-image: url('{{ asset($bgImage) }}');" @endif>
    <div class="ui-page-header-content">
        <nav class="ui-breadcrumb" aria-label="breadcrumb">
            @foreach($items as $item)
                <div class="ui-breadcrumb-item">
                    @if(!$loop->last)
                        <a href="{{ $item['url'] }}" class="ui-breadcrumb-link">
                            {{ $item['label'] }}
                        </a>
                        <i class="fa-solid fa-chevron-right ui-breadcrumb-sep"></i>
                    @else
                        <span class="ui-breadcrumb-current">{{ $item['label'] }}</span>
                    @endif
                </div>
            @endforeach
        </nav>

        @if($title)
            <h1 class="ui-page-header-title">{{ $title }}</h1>
        @endif

        @if($subtitle)
            <p class="ui-page-header-subtitle">{{ $subtitle }}</p>
        @endif
    </div>
</div>
