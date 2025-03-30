<button type="{{ $type ?? 'button' }}" class="btn btn-{{ $style ?? 'primary' }} {{ $class ?? '' }}" {{ $attributes }}>
    {{ $slot }}
</button>
