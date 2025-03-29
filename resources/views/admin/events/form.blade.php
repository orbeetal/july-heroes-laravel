<div class="grid gap-4 lg:grid-cols-12">
    <!-- Image -->
    <div class="col-span-full">
        <div class="flex items-center">
            <label
                for="image"
                class="border w-full max-w-2xl aspect-video cursor-pointer overflow-hidden bg-red-300"
            >
                <img
                    id="imagePreview"
                    src="{{ $event->image ?? '' }}"
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

    <!-- Date -->
    <div class="lg:col-span-6">
        <label
            for="incident_date"
            class="block text-sm font-medium text-gray-700"
        >
            Event Date <i class="text-gray-500">[Required]</i>
        </label>
        <input
            value="{{ old('date', $event->date) }}"
            type="date"
            id="date"
            name="date"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
            required
        />
        @error('date')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Status -->
    <div class="col-span-full lg:col-span-6">
        <label for="status" class="block text-sm font-medium text-gray-700">
            Status <i class="text-gray-500">[Required]</i>
        </label>
        <select
            id="status"
            name="status"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
            required
        >
            <option value="1" @selected((old('status') ?? $event->status) === 1)>Active</option>
            <option value="0" @selected((old('status') ?? $event->status) === 0)>Inactive</option>
        </select>
        @error('status')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Title (Bn) -->
    <div class="col-start-1 col-span-full lg:col-span-6">
        <label for="title_bn" class="block text-sm font-medium text-gray-700">
            Title / শিরোনাম (Bn) <i class="text-gray-500">[Required]</i>
        </label>
        <input
            value="{{ old('title_bn', $event->title_bn) }}"
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
            value="{{ old('title_en', $event->title_en) }}"
            type="text"
            id="title_en"
            name="title_en"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('title_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Location (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="location_bn"
            class="block text-sm font-medium text-gray-700"
        >
            Location / স্থান (Bn)
        </label>
        <input
            value="{{ old('location_bn', $event->location_bn) }}"
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
            value="{{ old('location_en', $event->location_en) }}"
            type="text"
            id="location_en"
            name="location_en"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('location_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Description (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="description_bn"
            class="block text-sm font-medium text-gray-700"
        >
            Description / বর্ণনা (Bn)
        </label>
        <x-text-editor
            id="description_bn"
            name="description_bn"
            class="w-full min-h-80 rounded-lg"
            :value="old('description_bn', $event->description_bn)"
        />
        @error('description_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Description (En) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="description_en"
            class="block text-sm font-medium text-gray-700"
        >
            Description (En)
        </label>
        <x-text-editor
            id="description_en"
            name="description_en"
            class="w-full min-h-80 rounded-lg"
            :value="old('description_bn', $event->description_en)"
        />
        @error('description_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>
