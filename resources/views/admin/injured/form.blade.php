<div class="grid gap-4 lg:grid-cols-12">
    <!-- Image -->
    <div class="col-span-full">
        <div class="flex items-center">
            <label
                for="image"
                class="border w-full max-w-60 aspect-square cursor-pointer overflow-hidden bg-red-300"
            >
                <img
                    id="imagePreview"
                    src="{{ $injured->image ?? '' }}"
                    alt="Photo 1"
                    class="w-full aspect-square object-cover"
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

    <!-- Name (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label for="name_bn" class="block text-sm font-medium text-gray-700">
            নাম / Name (Bn) <i class="text-gray-500">[Required]</i>
        </label>
        <input
            value="{{ old('name_bn', $injured->name_bn) }}"
            type="text"
            id="name_bn"
            name="name_bn"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
            required
        />
        @error('name_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Name (En) -->
    <div class="col-span-full lg:col-span-6">
        <label for="name_en" class="block text-sm font-medium text-gray-700">
            Name (En)
        </label>
        <input
            value="{{ old('name_en', $injured->name_en) }}"
            type="text"
            id="name_en"
            name="name_en"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('name_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Age -->
    <div class="col-span-full lg:col-span-6">
        <label for="age" class="block text-sm font-medium text-gray-700">
            Age (Only En Number)
        </label>
        <input
            value="{{ old('age', $injured->age) }}"
            type="number"
            id="age"
            name="age"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('age')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Incident Date -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="incident_date"
            class="block text-sm font-medium text-gray-700"
        >
            Incident Date
        </label>
        <input
            value="{{ old('incident_date', $injured->incident_date) }}"
            type="date"
            id="incident_date"
            name="incident_date"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('incident_date')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Incident (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="incident_bn"
            class="block text-sm font-medium text-gray-700"
        >
            ঘটনার বর্ণনা / Incident Description (Bn)
        </label>
        <x-text-editor
            id="incident_bn"
            name="incident_bn"
            class="w-full min-h-80 rounded-lg"
            :value="old('incident_bn', $injured->incident_bn)"
        />
        @error('incident_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Incident (En) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="incident_en"
            class="block text-sm font-medium text-gray-700"
        >
            Incident Description (En)
        </label>
        <x-text-editor
            id="incident_en"
            name="incident_en"
            class="w-full min-h-80 rounded-lg"
            :value="old('incident_en', $injured->incident_en)"
        />
        @error('incident_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Biography (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="biography_bn"
            class="block text-sm font-medium text-gray-700"
        >
            ব্যক্তিগত জীবন / Biography (Bn)
        </label>
        <x-text-editor
            id="biography_bn"
            name="biography_bn"
            class="w-full min-h-80 rounded-lg"
            :value="old('biography_bn', $injured->biography_bn)"
        />
        @error('biography_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Biography (En) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="biography_en"
            class="block text-sm font-medium text-gray-700"
        >
            Biography (En)
        </label>
        <x-text-editor
            id="biography_en"
            name="biography_en"
            class="w-full min-h-80 rounded-lg"
            :value="old('biography_en', $injured->biography_en)"
        />
        @error('biography_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Address (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label for="address_bn" class="block text-sm font-medium text-gray-700">
            জন্মস্থান / Address (Bn)
        </label>
        <textarea
            id="address_bn"
            name="address_bn"
            class="w-full min-h-20 p-2 border border-gray-300 rounded-lg"
            >{{ old('address_bn', $injured->address_bn) }}</textarea
        >
        @error('address_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Address (En) -->
    <div class="col-span-full lg:col-span-6">
        <label for="address_en" class="block text-sm font-medium text-gray-700">
            Birth Place / Address (En)
        </label>
        <textarea
            id="address_en"
            name="address_en"
            class="w-full min-h-20 p-2 border border-gray-300 rounded-lg"
            >{{ old('address_en', $injured->address_en) }}</textarea
        >
        @error('address_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Occupation (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="occupation_bn"
            class="block text-sm font-medium text-gray-700"
        >
            পেশা / Occupation (Bn)
        </label>
        <input
            value="{{ old('occupation_bn', $injured->occupation_bn) }}"
            type="text"
            id="occupation_bn"
            name="occupation_bn"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('occupation_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Occupation (En) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="occupation_en"
            class="block text-sm font-medium text-gray-700"
        >
            Occupation (En)
        </label>
        <input
            value="{{ old('occupation_en', $injured->occupation_en) }}"
            type="text"
            id="occupation_en"
            name="occupation_en"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('occupation_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Institution (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="institution_bn"
            class="block text-sm font-medium text-gray-700"
        >
            Institution (Bn)
            <i class="text-gray-500">[শিক্ষা প্রতিষ্ঠান / কর্মস্থল]</i>
        </label>
        <input
            value="{{ old('institution_bn', $injured->institution_bn) }}"
            type="text"
            id="institution_bn"
            name="institution_bn"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('institution_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Institution (En) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="institution_en"
            class="block text-sm font-medium text-gray-700"
        >
            Institution (En)
            <i class="text-gray-500">[শিক্ষা প্রতিষ্ঠান / কর্মস্থল]</i>
        </label>
        <input
            value="{{ old('institution_en', $injured->institution_en) }}"
            type="text"
            id="institution_en"
            name="institution_en"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('institution_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Department (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="department_bn"
            class="block text-sm font-medium text-gray-700"
        >
            Department / Subject / Sector (Bn)
        </label>
        <input
            value="{{ old('department_bn', $injured->department_bn) }}"
            type="text"
            id="department_bn"
            name="department_bn"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('department_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Department (En) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="department_en"
            class="block text-sm font-medium text-gray-700"
        >
            Department / Subject / Sector (En)
        </label>
        <input
            value="{{ old('department_en', $injured->department_en) }}"
            type="text"
            id="department_en"
            name="department_en"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('department_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>
