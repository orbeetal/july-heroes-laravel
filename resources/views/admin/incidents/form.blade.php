<div class="grid gap-4 lg:grid-cols-12">
    <!-- Title (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label for="title_bn" class="block text-sm font-medium text-gray-700">
            Title / শিরোনাম (Bn)
            <i class="text-gray-500">[Default]</i>
        </label>
        <input
            value="{{ old('title_bn') ?? $incident->title_bn }}"
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
            value="{{ old('title_en') ?? $incident->title_en }}"
            type="text"
            id="title_en"
            name="title_en"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('title_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Description (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label for="description_bn" class="block text-sm font-medium text-gray-700">
            Description / বর্ণনা (Bn)
            <i class="text-gray-500">[Default]</i>
        </label>
        <x-text-editor
            id="description_bn"
            name="description_bn"
            class="w-full min-h-80 rounded-lg"
            :value="$incident->description_bn"
        />
        @error('description_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Description (En) -->
    <div class="col-span-full lg:col-span-6">
        <label for="description_en" class="block text-sm font-medium text-gray-700">
            Description (En)
        </label>
        <x-text-editor
            id="description_en"
            name="description_en"
            class="w-full min-h-80 rounded-lg"
            :value="$incident->description_en"
        />
        @error('description_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>
