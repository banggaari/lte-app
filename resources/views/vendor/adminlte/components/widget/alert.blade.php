<div {{ $attributes->merge(['class' => $makeAlertClass()]) }}>

    {{-- Dismiss button --}}
    @isset($dismissable)
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;
        </button>
    @endisset

    {{-- Alert header --}}
    @if(! empty($title) || ! empty($icon))
    <div class="d-inline p-2">
            @if(! empty($icon))
                <i class="icon {{ $icon }}"></i>
            @endif

            @if(! empty($title))
                {{ $title }}
            @endif
    </div>
    @endif

    {{-- Alert content --}}
    {{ $slot }}

</div>
