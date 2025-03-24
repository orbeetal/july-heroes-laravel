<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between gap-2 items-center">
            <a href="{{ route('dashboard.martyrs.index') }}"
               class="text-gray-600 hover:text-gray-900">
                &larr; Back to List
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $martyr->name_bn }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container sm:px-6 lg:px-8 bg-white p-6 shadow rounded-md space-y-6">

            {{-- Image --}}
            @if ($martyr->image)
                <div class="flex justify-center">
                    <img src="{{ $martyr->image }}" alt="Martyr Image" class="border w-60 h-60 object-cover rounded-md" />
                </div>
            @endif

            {{-- Basic Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div><strong>নাম (Bn):</strong> {{ $martyr->name_bn }}</div>
                <div><strong>Name (En):</strong> {{ $martyr->name_en }}</div>
                <div><strong>Age:</strong> {{ $martyr->age }}</div>
                <div><strong>Incident Date:</strong> {{ $martyr->incident_date }}</div>
            </div>

            {{-- Incident Description --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <strong>ঘটনার বর্ণনা (Bn):</strong>
                    <p class="text-gray-700 whitespace-pre-line">{{ $martyr->incident_bn }}</p>
                </div>
                <div>
                    <strong>Incident Description (En):</strong>
                    <p class="text-gray-700 whitespace-pre-line">{{ $martyr->incident_en }}</p>
                </div>
            </div>

            {{-- Biography --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <strong>ব্যক্তিগত জীবন (Bn):</strong>
                    <p class="text-gray-700 whitespace-pre-line">{{ $martyr->biography_bn }}</p>
                </div>
                <div>
                    <strong>Biography (En):</strong>
                    <p class="text-gray-700 whitespace-pre-line">{{ $martyr->biography_en }}</p>
                </div>
            </div>

            {{-- Address --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div><strong>ঠিকানা (Bn):</strong> {{ $martyr->address_bn }}</div>
                <div><strong>Address (En):</strong> {{ $martyr->address_en }}</div>
            </div>

            {{-- Occupation & Institution --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div><strong>পেশা (Bn):</strong> {{ $martyr->occupation_bn }}</div>
                <div><strong>Occupation (En):</strong> {{ $martyr->occupation_en }}</div>
                <div><strong>Institution (Bn):</strong> {{ $martyr->institution_bn }}</div>
                <div><strong>Institution (En):</strong> {{ $martyr->institution_en }}</div>
                <div><strong>Department (Bn):</strong> {{ $martyr->department_bn }}</div>
                <div><strong>Department (En):</strong> {{ $martyr->department_en }}</div>
            </div>

            {{-- Back Button --}}
            <div class="pt-6">
                <a href="{{ route('dashboard.martyrs.index') }}"
                   class="text-blue-600 hover:underline">
                    &larr; Back to Martyrs List
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
