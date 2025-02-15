<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between gap-2 items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Martyr List") }}
            </h2>
            @if(count($martyrs) < 18)
            <a
                href="{{ route('dashboard.martyrs.create') }}"
                class="px-4 py-1 border rounded-lg cursor-pointer border-brand-primary text-brand-primary bg-white hover:text-white hover:bg-brand-primary"
            >
                New Martyr
            </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full table table-auto">
                    <thead>
                        <tr class="*:px-3 *:py-2 bg-gray-200">
                            <th class="text-center">SL</th>
                            <th class="text-left">Name</th>
                            <th class="text-center">Occupation</th>
                            <th class="text-center">Incident Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($martyrs as $martyr)
                        <tr
                            class="*:px-3 *:py-3 hover:bg-gray-100 {{ request('martyr') == $martyr->id ? 'bg-brand-primary/15' : '' }}"
                        >
                            <td class="text-center">
                                {{ $martyrs->firstItem() + $loop->index }}
                            </td>
                            <td class="text-left *:line-clamp-1">
                                <div>
                                    <span class="text-gray-500"> Bn: </span>
                                    {{ $martyr->name_bn }}
                                </div>
                                <div>
                                    <span class="text-gray-500"> En: </span>
                                    {{ $martyr->name_en }}
                                </div>
                            </td>
                            <td class="text-center *:line-clamp-1">
                                <div>
                                    <span class="text-gray-500"> Bn: </span>
                                    {{ $martyr->occupation_bn }}
                                </div>
                                <div>
                                    <span class="text-gray-500"> En: </span>
                                    {{ $martyr->occupation_en }}
                                </div>
                            </td>
                            <td class="text-center *:line-clamp-1">
                                {{ $martyr->incident_date }}
                            </td>
                            <td class="text-center">
                                {{--
                                <a
                                    href="{{ route('dashboard.martyrs.show', $martyr->id) }}"
                                >
                                    Show
                                </a>
                                --}}
                                <a
                                    class="px-4 text-sm py-1 rounded-lg bg-sky-500 text-white"
                                    href="{{ route('dashboard.martyrs.edit', $martyr->id) }}"
                                    >Edit</a
                                >
                            </td>
                        </tr>
                        @empty
                        <tr class="*:px-3 *:py-2">
                            <td colspan="100">
                                <div
                                    class="text-red-600 text-xl py-8 text-center"
                                >
                                    No data found!
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $martyrs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
