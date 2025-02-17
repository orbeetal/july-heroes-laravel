@props([
    'src' => '',
    'alt' => 'image',
])

<a
    href="{{ $src }}"
    target="_blank"
    class="mx-auto block w-12 aspect-square overflow-hidden border"
>
    <img
        src="{{ $src }}"
        alt="{{ $alt }}"
        class="w-full aspect-square object-cover"
    />
</a>
