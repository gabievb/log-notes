@if($linkto ?? false)
    <a href="{{Route::has($linkto) ? route($linkto) : $linkto}}" id="{{$id ?? ''}}">
        <button class="{{$class ?? ''}}" {{ $attributes }}>
            {{$slot}}
        </button>
    </a>
@else
    <button class="{{$class ?? ''}}" id="{{$id ?? ''}}" {{ $attributes }}>
        {{$slot}}
    </button>
@endif