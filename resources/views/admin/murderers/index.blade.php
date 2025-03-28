<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between gap-2 items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Murderer List") }}
            </h2>
            <a
                href="{{ route('dashboard.murderers.create') }}"
                class="px-4 py-1 border rounded-lg cursor-pointer border-brand-primary text-brand-primary bg-white hover:text-white hover:bg-brand-primary"
            >
                New Murderer
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
                            <th class="text-center">Organization</th>
                            <th class="text-center">Designation</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($murderers as $murderer)
                        <tr
                            class="*:px-3 *:py-3 hover:bg-gray-100 {{ request('murderer') == $murderer->id ? 'bg-brand-primary/15' : '' }}"
                        >
                            <td class="text-center">
                                {{ $murderers->firstItem() + $loop->index }}
                            </td>
                            <td class="text-center">
                                <x-profile-image-preview :src="route('murderers.streamImage', $murderer->id)" />
                            </td>
                            <td class="text-left *:line-clamp-1">
                                <div>
                                    <span class="text-gray-500"> Bn: </span>
                                    {{ $murderer->name_bn }}
                                </div>
                                <div>
                                    <span class="text-gray-500"> En: </span>
                                    {{ $murderer->name_en }}
                                </div>
                            </td>
                            <td class="text-center *:line-clamp-1">
                                <div>
                                    <span class="text-gray-500"> Bn: </span>
                                    {{ $murderer->organization_bn }}
                                </div>
                                <div>
                                    <span class="text-gray-500"> En: </span>
                                    {{ $murderer->organization_en }}
                                </div>
                            </td>
                            <td class="text-center *:line-clamp-1">
                                <div>
                                    <span class="text-gray-500"> Bn: </span>
                                    {{ $murderer->designation_bn }}
                                </div>
                                <div>
                                    <span class="text-gray-500"> En: </span>
                                    {{ $murderer->designation_en }}
                                </div>
                            </td>
                            <td class="text-center">
                                <x-action-edit-and-details
                                    :edit_href="route('dashboard.murderers.edit', $murderer->id)"
                                    :details_href="route('dashboard.murderers.show', $murderer->id)"
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
                {{ $murderers->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
