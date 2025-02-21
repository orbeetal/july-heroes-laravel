<div class="grid gap-4 lg:grid-cols-12">
    <!-- Image -->
    <div class="col-span-full">
        <div class="flex items-center">
            <label
                for="image"
                class="border w-full aspect-[16/5] cursor-pointer overflow-hidden bg-red-300"
            >
                <img
                    id="imagePreview"
                    src="{{ $banner->image ?? '' }}"
                    alt="Photo 1"
                    class="w-full aspect-[16/5] object-cover"
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

    <!-- Page -->
    <div class="col-span-full lg:col-span-6">
        <label for="page" class="block text-sm font-medium text-gray-700">
            Page <i class="text-gray-500">[Required]</i>
        </label>
        <select
            id="page"
            name="page"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
            required
        >
            <option value="home" @selected((old('page') ?? $banner->page) === 'home')>Home Page</option>
            <option value="martyrs" @selected((old('page') ?? $banner->page) === 'martyrs')>Martyrs Page</option>
            <option value="injured" @selected((old('page') ?? $banner->page) === 'injured')>Injured Page</option>
            <option value="murderers" @selected((old('page') ?? $banner->page) === 'murderers')>Murderers Page</option>
        </select>
        @error('page')
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
            <option value="1" @selected((old('status') ?? $banner->status) === 1)>Active</option>
            <option value="0" @selected((old('status') ?? $banner->status) === 0)>Inactive</option>
        </select>
        @error('status')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>
