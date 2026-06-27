<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Post Sub Categories Edit') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Update Post Sub Category Details') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="container mx-auto p-4">
        <!-- Back Button -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('sub.categorys.index') }}" id="backBtn" class="bg-green-600 text-white text-sm px-3 py-1 rounded hover:bg-green-700 flex items-center" wire:navigate>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-1">
                  <path d="M7.712 4.818A1.5 1.5 0 0 1 10 6.095v2.972c.104-.13.234-.248.389-.343l6.323-3.906A1.5 1.5 0 0 1 19 6.095v7.81a1.5 1.5 0 0 1-2.288 1.276l-6.323-3.905a1.505 1.505 0 0 1-.389-.344v2.973a1.5 1.5 0 0 1-2.288 1.276l-6.323-3.905a1.5 1.5 0 0 1 0-2.552l6.323-3.906Z" />
              </svg>Back
            </a>
        </div>

        <div class="w-full">
            @if (session()->has('message'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit="submit" class="space-y-6">
                <!-- Form fields -->
                <div class="flex flex-col md:flex-row gap-4 w-full">
                    <!-- Name Field -->
                    <div class="flex-1 min-w-[200px]">
                        <flux:input wire:model="name" label="Name" placeholder="Enter sub category name" class="w-full" />
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Category Dropdown -->
                    <div class="flex-1 min-w-[200px]">
                        <flux:select wire:model="category_id" label="Category" class="w-full">
                            <option value="">-- Select Category --</option>
                            @foreach($categoryes as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </flux:select>
                        @error('category_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex-1 min-w-[200px]">
                        <flux:input wire:model="image" label="Image" type="file" placeholder="Select image" class="w-full"/>
                    </div>
                </div>
                <div>
                    <flux:textarea wire:model="description" label="Description" placeholder="Enter detailed description..." rows="3" class="w-full min-h-[100px]"/>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <flux:button type="submit" variant="primary">
                        Update
                    </flux:button>
                </div>
            </form>
        </div>
    </div>
</div>