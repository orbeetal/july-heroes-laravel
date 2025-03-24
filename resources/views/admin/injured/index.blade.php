<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between gap-2 items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Injured List") }}
            </h2>
            <a
                href="{{ route('dashboard.injured.create') }}"
                class="px-4 py-1 border rounded-lg cursor-pointer border-brand-primary text-brand-primary bg-white hover:text-white hover:bg-brand-primary"
            >
                New Injured
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full table table-auto">
                    <thead>
                        <tr class="*:px-3 *:py-2 bg-gray-200">
                            <th class="text-center">SL</th>
                            <th class="text-center">Image</th>
                            <th class="text-left">Name</th>
                            <th class="text-center">Occupation</th>
                            <th class="text-center">Incident Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($injureds as $injured)
                        <tr
                            class="*:px-3 *:py-3 hover:bg-gray-100 {{ request('injured') == $injured->id ? 'bg-brand-primary/15' : '' }}"
                        >
                            <td class="text-center">
                                {{ $injureds->firstItem() + $loop->index }}
                            </td>
                            <td class="text-center">
                                <x-profile-image-preview :src="route('injured.streamImage', $injured->id)" />
                            </td>
                            <td class="text-left *:line-clamp-1">
                                <div>
                                    <span class="text-gray-500"> Bn: </span>
                                    {{ $injured->name_bn }}
                                </div>
                                <div>
                                    <span class="text-gray-500"> En: </span>
                                    {{ $injured->name_en }}
                                </div>
                            </td>
                            <td class="text-center *:line-clamp-1">
                                <div>
                                    <span class="text-gray-500"> Bn: </span>
                                    {{ $injured->occupation_bn }}
                                </div>
                                <div>
                                    <span class="text-gray-500"> En: </span>
                                    {{ $injured->occupation_en }}
                                </div>
                            </td>
                            <td class="text-center *:line-clamp-1">
                                {{ $injured->incident_date }}
                            </td>
                            <td class="text-center">
                                <x-action-edit-and-details
                                    :edit_href="route('dashboard.injured.edit', $injured->id)"
                                    :details_href="route('dashboard.injured.show', $injured->id)"
                                />
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
                {{ $injureds->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
