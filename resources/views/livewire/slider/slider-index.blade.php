<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Slider') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage Your Slider') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="container mx-auto p-4">
    <!-- Add Button -->
    <div class="mb-4">
      <div class="flex justify-end mb-4">
        <a href="{{ route('slider.create') }}" id="addBtn" class="bg-green-600 text-white text-sm px-3 py-1 rounded hover:bg-green-700 flex items-center" wire:navigate>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-0.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>
          Add
        </a>
      </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach($sliders as $key => $slider)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->index + $sliders->firstItem() }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><img src="{{ asset('uploads/slider/'.$slider->image) }}" height="100px" width="100px" /></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $slider->title }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $slider->description }}</td>
              <td class="px-6 py-4" width="20%">
                <a href="{{ route('slider.edit', [$slider->id]) }}" class="inline-flex items-center gap-1 bg-white text-blue-600 text-sm px-3 py-1 rounded hover:bg-gray-100 transition" data-id="1" wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                      <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                      <path d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                    </svg>
                    <span>Edit</span>
                </a>
                <button wire:click="confirmDelete({{ $slider->id }})" class="inline-flex items-center gap-1 bg-white text-red-600 text-sm px-3 py-1 rounded hover:bg-red-100 transition">
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
      {{ $sliders->links() }}
    </div>

    {{-- include it for delete model --}}
    @include('livewire.include.model.deleteModel')
</div>
