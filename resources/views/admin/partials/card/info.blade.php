@if($selectedNavigation)
    @if($selectedNavigation->{'help_'.$selectedNavigation->mode.'_title'})
        <div class="callout callout-info callout-help bg-light">
            <h4 class="title">{{ $selectedNavigation->{'help_'.$selectedNavigation->mode.'_title'} }}</h4>
            <p>{!! $selectedNavigation->{'help_'.$selectedNavigation->mode.'_content'} !!}</p>
        </div>
    @endif
@endif
