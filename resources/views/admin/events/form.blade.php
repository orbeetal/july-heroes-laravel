<div class="grid gap-4 lg:grid-cols-12">
    <!-- Title -->
    <div class="col-span-full">
        <label for="title" class="block text-sm font-medium text-gray-700">
            Event Title
        </label>
        <input
            value="{{ old('title') ?? $event->title }}"
            type="text"
            id="title"
            name="title"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
            required
        />
        @error('title')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Body -->
    <div class="col-span-full">
        <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
        <x-text-editor name="body" :value="$event->body" />
        @error('body')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>
