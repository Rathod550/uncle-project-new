<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Site Settings') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Update Site Settings') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="container mx-auto p-4">
    <!-- Add Button -->
    <div class="flex justify-end mb-4">
      <a href="{{ route('posts.index') }}" id="addBtn" class="bg-green-600 text-white text-sm px-3 py-1 rounded hover:bg-green-700 items-center" wire:navigate>
        <i class="fa-solid fa-arrow-left"></i> Back
      </a>
    </div>

    <div class="w-full">
        <form wire:submit="submit" enctype="multipart/form-data" class="space-y-6" >
            <div class="flex flex-wrap gap-4">
              <div class="flex-1 min-w-[200px]">
                <flux:input wire:model="setting.{{ $settings['contact-us-mobile-number']['slug'] }}" label="{{ $settings['contact-us-mobile-number']['name'] }}" placeholder="Enter title" class="w-full"/>
              </div>
              <div class="flex-1 min-w-[200px]">
                <flux:input wire:model="setting.{{ $settings['main-header-logo']['slug'] }}" label="{{ $settings['main-header-logo']['name'] }}" type="file" placeholder="Select {{ $settings['main-header-logo']['name'] }}" class="w-full"/>
              </div>
            </div>
            <div>
              <flux:textarea wire:model="setting.description" label="Description" placeholder="Enter detailed description..." rows="3" class="w-full min-h-[100px]"/>
            </div>
            <div class="flex justify-center pt-2">
              <flux:button type="submit" variant="primary" class="px-6 py-2">
                Update
              </flux:button>
            </div>
          </form>
      </div>    
</div>
