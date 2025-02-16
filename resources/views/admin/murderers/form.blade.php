<div class="grid gap-4 lg:grid-cols-12">
    <!-- Name (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label for="name_bn" class="block text-sm font-medium text-gray-700">
            নাম / Name (Bn) <i class="text-gray-500">[Required]</i>
        </label>
        <input
            value="{{ old('name_bn', $murderer->name_bn) }}"
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
            value="{{ old('name_en', $murderer->name_en) }}"
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
            value="{{ old('age', $murderer->age) }}"
            type="number"
            id="age"
            name="age"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('age')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-span-full lg:col-span-6">

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
            >{{ old('address_bn', $murderer->address_bn) }}</textarea
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
            >{{ old('address_en', $murderer->address_en) }}</textarea
        >
        @error('address_en')
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
        <textarea
            id="biography_bn"
            name="biography_bn"
            class="w-full min-h-40 p-2 border border-gray-300 rounded-lg"
            >{{ old('biography_bn', $murderer->biography_bn) }}</textarea
        >
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
        <textarea
            id="biography_en"
            name="biography_en"
            class="w-full min-h-40 p-2 border border-gray-300 rounded-lg"
            >{{ old('biography_en', $murderer->biography_en) }}</textarea
        >
        @error('biography_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Incident (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="incident_details_bn"
            class="block text-sm font-medium text-gray-700"
        >
            হত্যার বর্ণনা / Murder Details (Bn)
        </label>
        <textarea
            id="incident_details_bn"
            name="incident_details_bn"
            class="w-full min-h-80 p-2 border border-gray-300 rounded-lg"
            >{{ old('incident_details_bn', $murderer->incident_details_bn) }}</textarea
        >
        @error('incident_details_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Incident (En) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="incident_details_en"
            class="block text-sm font-medium text-gray-700"
        >
            Murder Details (En)
        </label>
        <textarea
            id="incident_details_en"
            name="incident_details_en"
            class="w-full min-h-80 p-2 border border-gray-300 rounded-lg"
            >{{ old('incident_details_en', $murderer->incident_details_en) }}</textarea
        >
        @error('incident_details_en')
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
            value="{{ old('occupation_bn', $murderer->occupation_bn) }}"
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
            value="{{ old('occupation_en', $murderer->occupation_en) }}"
            type="text"
            id="occupation_en"
            name="occupation_en"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('occupation_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Organization (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="organization_bn"
            class="block text-sm font-medium text-gray-700"
        >
            সংগঠন / Organization (Bn)
        </label>
        <input
            value="{{ old('organization_bn', $murderer->organization_bn) }}"
            type="text"
            id="organization_bn"
            name="organization_bn"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('organization_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Organization (En) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="organization_en"
            class="block text-sm font-medium text-gray-700"
        >
            Organization (En)
        </label>
        <input
            value="{{ old('organization_en', $murderer->organization_en) }}"
            type="text"
            id="organization_en"
            name="organization_en"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('organization_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Designation (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="designation_bn"
            class="block text-sm font-medium text-gray-700"
        >
            পদবী / Designation (Bn)
        </label>
        <input
            value="{{ old('designation_bn', $murderer->designation_bn) }}"
            type="text"
            id="designation_bn"
            name="designation_bn"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('designation_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Designation (En) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="designation_en"
            class="block text-sm font-medium text-gray-700"
        >
            Designation (En)
        </label>
        <input
            value="{{ old('designation_en', $murderer->designation_en) }}"
            type="text"
            id="designation_en"
            name="designation_en"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('designation_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>
