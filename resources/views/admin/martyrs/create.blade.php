<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between gap-2 items-center">
            <a
                href="{{ route('dashboard.martyrs.index') }}"
                class="cursor-pointer text-gray-600 hover:text-gray-900"
            >
                &larr; Back to List
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("New Martyr Form") }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container sm:px-6 lg:px-8">
            <form
                method="POST"
                action="{{ route('dashboard.martyrs.store') }}"
                class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 md:p-8 grid gap-4"
                enctype="multipart/form-data"
                autocomplete="off"
            >
                @csrf @include('admin.martyrs.form')

                <hr />

                <div class="flex justify-between gap-2 items-center">
                    <a
                        href="{{ route('dashboard.martyrs.index') }}"
                        class="cursor-pointer text-gray-600 hover:text-gray-900"
                    >
                        &larr; Back without save
                    </a>
                    <button
                        type="submit"
                        class="px-4 py-1 border rounded-md cursor-pointer border-green-600 text-green-600 bg-white hover:text-white hover:bg-green-600"
                    >
                        Save new martyr
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
