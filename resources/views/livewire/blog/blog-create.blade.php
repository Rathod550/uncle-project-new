<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Blogs Create') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Create Blog') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="container mx-auto p-4">
    <!-- Add Button -->
    <div class="flex justify-end mb-4">
      <a href="{{ route('blogs.index') }}" id="backBtn" class="bg-green-600 text-white text-sm px-3 py-1 rounded hover:bg-green-700 flex items-center" wire:navigate>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-1">
            <path d="M7.712 4.818A1.5 1.5 0 0 1 10 6.095v2.972c.104-.13.234-.248.389-.343l6.323-3.906A1.5 1.5 0 0 1 19 6.095v7.81a1.5 1.5 0 0 1-2.288 1.276l-6.323-3.905a1.505 1.505 0 0 1-.389-.344v2.973a1.5 1.5 0 0 1-2.288 1.276l-6.323-3.905a1.5 1.5 0 0 1 0-2.552l6.323-3.906Z" />
        </svg>Back
      </a>
    </div>

    <div class="w-full">
        <form wire:submit="submit" enctype="multipart/form-data" class="space-y-6" >
            <div class="flex flex-wrap gap-4">
              <div class="flex-1 min-w-[200px]">
                <flux:input wire:model="title" label="Title" placeholder="Enter title" class="w-full"/>
              </div>
              <div class="flex-1 min-w-[200px]">
                <flux:input wire:model="image" label="Image" type="file" placeholder="Select image" class="w-full"/>
              </div>
            </div>
            <div class="flex-1 min-w-[200px]">
                <label for="summernote" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Description</label>

                <div class="@error('description') border border-red-500 rounded-md @else border border-gray-300 rounded-md @enderror">
                    <div wire:ignore>
                        <textarea id="summernote"></textarea>
                    </div>
                </div>

                @error('description')
                    <div class="flex items-center text-sm text-red-600 mt-4">
                        <svg class="shrink-0 [:where(&amp;)]:size-5 inline" data-flux-icon="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                          <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd"></path>
                        </svg>
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>


            <div class="flex flex-wrap gap-4">
                <!-- Category Select -->
                <div class="flex-1 min-w-[200px]">
                  <flux:select wire:model="blog_category_id" label="Blog Category" class="w-full">
                    <option value="">-- Select Blog Category --</option>
                    @foreach($blogCategoryes as $blogCategory)
                      <option value="{{ $blogCategory->id }}">{{ $blogCategory->name }}</option>
                    @endforeach
                  </flux:select>
                </div>
                <div class="flex-1 min-w-[200px]">
                  
                </div>
              </div>
            <div class="flex justify-center pt-2">
              <flux:button type="submit" variant="primary" class="px-6 py-2">
                Create
              </flux:button>
            </div>
          </form>
      </div>    
</div>

<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 150,
            placeholder: 'Type here...'
        });

        $('#summernote').on('summernote.change', function (we, contents) {
            @this.set('description', contents);
        });
    });
</script>