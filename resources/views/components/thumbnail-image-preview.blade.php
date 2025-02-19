@props([
    'src' => '',
    'alt' => 'image',
])

<a
    href="{{ $src }}"
    target="_blank"
    class="mx-auto block w-20 aspect-video overflow-hidden border"
>
    <img
        src="{{ $src }}"
        alt="{{ $alt }}"
        class="w-full aspect-video object-cover"
    />
</a>
    