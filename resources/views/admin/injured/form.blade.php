<div class="grid gap-4 lg:grid-cols-12">
    <!-- Name (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label for="name_bn" class="block text-sm font-medium text-gray-700">
            Name (Bn) <i class="text-gray-500">[Required]</i>
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
        <label for="name_en" class="block text-sm font-medium text-gray-700"
            >Name (En)</label
        >
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
            >Incident Date</label
        >
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
        <label for="incident_bn" class="block text-sm font-medium text-gray-700"
            >Incident (Bn)</label
        >
        <textarea
            id="incident_bn"
            name="incident_bn"
            class="w-full min-h-40 p-2 border border-gray-300 rounded-lg"
            >{{ old('incident_bn', $injured->incident_bn) }}</textarea
        >
        @error('incident_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Incident (En) -->
    <div class="col-span-full lg:col-span-6">
        <label for="incident_en" class="block text-sm font-medium text-gray-700"
            >Incident (En)</label
        >
        <textarea
            id="incident_en"
            name="incident_en"
            class="w-full min-h-40 p-2 border border-gray-300 rounded-lg"
            >{{ old('incident_en', $injured->incident_en) }}</textarea
        >
        @error('incident_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Biography (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="biography_bn"
            class="block text-sm font-medium text-gray-700"
            >Biography (Bn)</label
        >
        <textarea
            id="biography_bn"
            name="biography_bn"
            class="w-full min-h-40 p-2 border border-gray-300 rounded-lg"
            >{{ old('biography_bn', $injured->biography_bn) }}</textarea
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
            >Biography (En)</label
        >
        <textarea
            id="biography_en"
            name="biography_en"
            class="w-full min-h-40 p-2 border border-gray-300 rounded-lg"
            >{{ old('biography_en', $injured->biography_en) }}</textarea
        >
        @error('biography_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Address (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label for="address_bn" class="block text-sm font-medium text-gray-700"
            >Address (Bn)</label
        >
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
        <label for="address_en" class="block text-sm font-medium text-gray-700"
            >Address (En)</label
        >
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
            >Occupation (Bn)</label
        >
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
            >Occupation (En)</label
        >
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

    <!-- University (Bn) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="university_bn"
            class="block text-sm font-medium text-gray-700"
            >University (Bn)</label
        >
        <input
            value="{{ old('university_bn', $injured->university_bn) }}"
            type="text"
            id="university_bn"
            name="university_bn"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('university_bn')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- University (En) -->
    <div class="col-span-full lg:col-span-6">
        <label
            for="university_en"
            class="block text-sm font-medium text-gray-700"
            >University (En)</label
        >
        <input
            value="{{ old('university_en', $injured->university_en) }}"
            type="text"
            id="university_en"
            name="university_en"
            class="mt-1 p-2 w-full border border-gray-300 rounded-md"
        />
        @error('university_en')
        <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>
