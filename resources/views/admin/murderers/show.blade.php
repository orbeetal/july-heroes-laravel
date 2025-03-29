<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a href="{{ route('dashboard.murderers.index') }}" class="text-gray-600 hover:text-gray-900">
                &larr; Back to List
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $murderer->name_bn }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container sm:px-6 lg:px-8 bg-white p-6 shadow rounded-md space-y-6">

            {{-- Image --}}
            @if ($murderer->image)
                <div class="flex justify-center">
                    <img src="{{ $murderer->image }}" alt="Murderer Image"
                         class="border w-60 h-60 object-cover rounded-md" />
                </div>
            @endif

            {{-- Basic Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div><strong>নাম (Bn):</strong> {{ $murderer->name_bn }}</div>
                <div><strong>Name (En):</strong> {{ $murderer->name_en }}</div>
                <div><strong>Age:</strong> {{ $murderer->age }}</div>
            </div>

            {{-- Address --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div><strong>ঠিকানা (Bn):</strong> {{ $murderer->address_bn }}</div>
                <div><strong>Address (En):</strong> {{ $murderer->address_en }}</div>
            </div>

            {{-- Profession --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div><strong>পেশা (Bn):</strong> {{ $murderer->occupation_bn }}</div>
                <div><strong>Occupation (En):</strong> {{ $murderer->occupation_en }}</div>
                <div><strong>সংগঠন (Bn):</strong> {{ $murderer->organization_bn }}</div>
                <div><strong>Organization (En):</strong> {{ $murderer->organization_en }}</div>
                <div><strong>পদবী (Bn):</strong> {{ $murderer->designation_bn }}</div>
                <div><strong>Designation (En):</strong> {{ $murderer->designation_en }}</div>
            </div>

            {{-- Biography --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <strong>ব্যক্তিগত জীবন (Bn):</strong>
                    <div class="prose max-w-full border p-3 rounded-lg">
                        {!! $murderer->biography_bn !!}
                    </div>
                </div>
                <div>
                    <strong>Biography (En):</strong>
                    <div class="prose max-w-full border p-3 rounded-lg">
                        {!! $murderer->biography_en !!}
                    </div>
                </div>
            </div>

            {{-- Murder Incident --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <strong>হত্যার বিবরণ (Bn):</strong>
                    <div class="prose max-w-full border p-3 rounded-lg">
                        {!! $murderer->incident_details_bn !!}
                    </div>
                </div>
                <div>
                    <strong>Murder Details (En):</strong>
                    <div class="prose max-w-full border p-3 rounded-lg">
                        {!! $murderer->incident_details_en !!}
                    </div>
                </div>
            </div>

            {{-- Back Button --}}
            <div class="pt-6">
                <a href="{{ route('dashboard.murderers.index') }}" class="text-blue-600 hover:underline">
                    &larr; Back to List
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
