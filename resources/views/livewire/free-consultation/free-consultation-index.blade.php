<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Free Consultation') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage Your Free Consultation') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="container mx-auto p-4">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" width="5%">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">message</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($freeConsultations as $key => $value)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->index + $freeConsultations->firstItem() }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" width="20%">{{ $value->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" width="20%">{{ $value->email ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" width="20%">{{ $value->message ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap" width="20%">
                                <button wire:click="confirmDelete({{ $value->id }})" class="inline-flex items-center gap-1 bg-white text-red-600 text-sm px-3 py-1 rounded hover:bg-red-100 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                      <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd" />
                                    </svg>
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $freeConsultations->links() }}
        </div>

        {{-- include it for delete model --}}
        @include('livewire.include.model.deleteModel')
    </div>
</div>