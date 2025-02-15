<div class="grid gap-4 lg:grid-cols-12">
    <!-- Title (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label for="title_bn" class="block text-sm font-medium text-gray-700">
            Title (Bn)
            <i class="text-gray-500">[Default]</i>
        </label>
        <input
            value="{{ old('title_bn') ?? $event->title_bn }}"
            type="text"
            id="title_bn"
            name="title_bn"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
            required
        />
        @error('title_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Title (En) -->
    <div class="col-span-full lg:col-span-6">
        <label for="title_en" class="block text-sm font-medium text-gray-700">
            Title (En)
        </label>
        <input
            value="{{ old('title_en') ?? $event->title_en }}"
            type="text"
            id="title_en"
            name="title_en"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('title_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Body (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label for="body_bn" class="block text-sm font-medium text-gray-700">
            Body (Bn)
            <i class="text-gray-500">[Default]</i>
        </label>
        <textarea
            name="body_bn"
            class="w-full min-h-80 rounded-lg"
            required
            >{{ $event->body_bn }}</textarea
        >
        @error('body_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Body (En) -->
    <div class="col-span-full lg:col-span-6">
        <label for="body_en" class="block text-sm font-medium text-gray-700">
            Body (En)
        </label>
        <textarea
            id="body_en"
            name="body_en"
            class="w-full min-h-80 rounded-lg"
            >{{ $event->body_en }}</textarea
        >
        @error('body_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>
