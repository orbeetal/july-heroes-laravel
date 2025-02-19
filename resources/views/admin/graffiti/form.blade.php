<div class="grid gap-4 lg:grid-cols-12">
    <!-- Image -->
    <div class="col-span-full">
        <div class="flex items-center">
            <label
                for="image"
                class="border w-full max-w-80 aspect-video cursor-pointer overflow-hidden bg-red-300"
            >
                <img
                    id="imagePreview"
                    src="{{ $graffiti->image ?? '' }}"
                    alt="Photo 1"
                    class="w-full aspect-video object-cover"
                />
                <input
                    name="image"
                    id="image"
                    onchange="previewImage(event, 'imagePreview')"
                    class="hidden"
                    type="file"
                    accept="image/*"
                />
            </label>
        </div>
        @error('image')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Title (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label for="title_bn" class="block text-sm font-medium text-gray-700">
            Title (Bn) <i class="text-gray-500">[Required]</i>
        </label>
        <input
            value="{{ old('title_bn', $graffiti->title_bn) }}"
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
            value="{{ old('title_en', $graffiti->title_en) }}"
            type="text"
            id="title_en"
            name="title_en"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('title_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Details (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="details_bn"
            class="block text-sm font-medium text-gray-700"
        >
            Details (Bn)
        </label>
        <textarea
            id="details_bn"
            name="details_bn"
            class="w-full min-h-40 p-2 border border-gray-300 rounded-lg"
            >{{ old('details_bn', $graffiti->details_bn) }}</textarea
        >
        @error('details_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Details (En) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="details_en"
            class="block text-sm font-medium text-gray-700"
        >
            Details (En)
        </label>
        <textarea
            id="details_en"
            name="details_en"
            class="w-full min-h-40 p-2 border border-gray-300 rounded-lg"
            >{{ old('details_en', $graffiti->details_en) }}</textarea
        >
        @error('details_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Plots (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label for="plots_bn" class="block text-sm font-medium text-gray-700">
            Plots (Bn)
        </label>
        <textarea
            id="plots_bn"
            name="plots_bn"
            class="w-full min-h-20 p-2 border border-gray-300 rounded-lg"
            >{{ old('plots_bn', $graffiti->plots_bn) }}</textarea
        >
        @error('plots_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Plots (En) -->
    <div class="col-span-full lg:col-span-6">
        <label for="plots_en" class="block text-sm font-medium text-gray-700">
            Plots (En)
        </label>
        <textarea
            id="plots_en"
            name="plots_en"
            class="w-full min-h-20 p-2 border border-gray-300 rounded-lg"
            >{{ old('plots_en', $graffiti->plots_en) }}</textarea
        >
        @error('plots_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Location (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="location_bn"
            class="block text-sm font-medium text-gray-700"
        >
            Location (Bn)
        </label>
        <input
            value="{{ old('location_bn', $graffiti->location_bn) }}"
            type="text"
            id="location_bn"
            name="location_bn"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('location_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Location (En) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="location_en"
            class="block text-sm font-medium text-gray-700"
        >
            Location (En)
        </label>
        <input
            value="{{ old('location_en', $graffiti->location_en) }}"
            type="text"
            id="location_en"
            name="location_en"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('location_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>
