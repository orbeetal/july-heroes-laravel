<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a href="{{ route('dashboard.injured.index') }}" class="text-gray-600 hover:text-gray-900">
                &larr; Back to List
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $injured->name_bn }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container sm:px-6 lg:px-8 bg-white p-6 shadow rounded-md space-y-6">

            {{-- Image --}}
            @if ($injured->image)
                <div class="flex justify-center">
                    <img src="{{ $injured->image }}" alt="Injured Image"
                         class="border w-60 h-60 object-cover rounded-md" />
                </div>
            @endif

            {{-- Basic Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div><strong>নাম (Bn):</strong> {{ $injured->name_bn }}</div>
                <div><strong>Name (En):</strong> {{ $injured->name_en }}</div>
                <div><strong>Age:</strong> {{ $injured->age }}</div>
                <div><strong>Incident Date:</strong> {{ $injured->incident_date }}</div>
            </div>

            {{-- Incident Description --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <strong>ঘটনার বর্ণনা (Bn):</strong>
                    <p class="text-gray-700 whitespace-pre-line">{{ $injured->incident_bn }}</p>
                </div>
                <div>
                    <strong>Incident Description (En):</strong>
                    <p class="text-gray-700 whitespace-pre-line">{{ $injured->incident_en }}</p>
                </div>
            </div>

            {{-- Biography --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <strong>ব্যক্তিগত জীবন (Bn):</strong>
                    <p class="text-gray-700 whitespace-pre-line">{{ $injured->biography_bn }}</p>
                </div>
                <div>
                    <strong>Biography (En):</strong>
                    <p class="text-gray-700 whitespace-pre-line">{{ $injured->biography_en }}</p>
                </div>
            </div>

            {{-- Address --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div><strong>ঠিকানা (Bn):</strong> {{ $injured->address_bn }}</div>
                <div><strong>Address (En):</strong> {{ $injured->address_en }}</div>
            </div>

            {{-- Occupation, Institution, Department --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div><strong>পেশা (Bn):</strong> {{ $injured->occupation_bn }}</div>
                <div><strong>Occupation (En):</strong> {{ $injured->occupation_en }}</div>
                <div><strong>Institution (Bn):</strong> {{ $injured->institution_bn }}</div>
                <div><strong>Institution (En):</strong> {{ $injured->institution_en }}</div>
                <div><strong>Department (Bn):</strong> {{ $injured->department_bn }}</div>
                <div><strong>Department (En):</strong> {{ $injured->department_en }}</div>
            </div>

            {{-- Back Button --}}
            <div class="pt-6">
                <a href="{{ route('dashboard.injured.index') }}" class="text-blue-600 hover:underline">
                    &larr; Back to Injured List
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
