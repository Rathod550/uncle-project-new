<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Blog Categories Create') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Create Blog Category') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="container mx-auto p-4">
    <!-- Add Button -->
    <div class="flex justify-end mb-4">
      <a href="{{ route('blog.categorys.index') }}" id="backBtn" class="bg-green-600 text-white text-sm px-3 py-1 rounded hover:bg-green-700 flex items-center" wire:navigate>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-1">
            <path d="M7.712 4.818A1.5 1.5 0 0 1 10 6.095v2.972c.104-.13.234-.248.389-.343l6.323-3.906A1.5 1.5 0 0 1 19 6.095v7.81a1.5 1.5 0 0 1-2.288 1.276l-6.323-3.905a1.505 1.505 0 0 1-.389-.344v2.973a1.5 1.5 0 0 1-2.288 1.276l-6.323-3.905a1.5 1.5 0 0 1 0-2.552l6.323-3.906Z" />
        </svg>Back
      </a>
    </div>

    <div class="w-full">
      <form wire:submit="submit" class="space-y-6">
        <div class="flex flex-wrap gap-4">
          <div class="w-1/2 min-w-[200px]">
            <flux:input wire:model="name" label="Name" placeholder="Name" />
          </div>
        </div>
        <div class="flex justify-center">
          <flux:button type="submit" variant="primary">Create</flux:button>
        </div>
      </form>
    </div>    
</div>
