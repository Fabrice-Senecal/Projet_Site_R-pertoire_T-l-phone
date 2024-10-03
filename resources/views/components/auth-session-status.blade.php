@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-center h-min w-full font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div>
@endif
