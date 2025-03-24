@props(['edit_href', 'details_href'])

<div class="flex justify-center gap-2">
    @if($edit_href ?? '')
    <a
        href="{{ $edit_href }}"
        class="px-4 text-xs py-1 rounded border border-sky-500 text-sky-500"
    >
        Edit
    </a>
    @endif @if($details_href ?? '')
    <a
        href="{{ $details_href }}"
        class="px-4 text-xs py-1 rounded bg-sky-500 text-white"
    >
        Details
    </a>
    @endif
</div>
