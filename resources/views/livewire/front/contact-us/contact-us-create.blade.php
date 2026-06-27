<div>
    <form wire:submit.prevent="submit">
        <div class="messages"></div>
        <div class="flex flex-wrap mx-[-10px]">
            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[10px] max-w-full">
                <div class="form-floating relative !mb-4">
                    <input type="text" id="name" wire:model="name" class="form-control border-0 relative block w-full text-[.75rem] font-medium !text-[#60697b] bg-[#fefefe] bg-clip-padding shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] duration-[0.15s] ease-in-out focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] placeholder:!text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] !leading-[1.25]">
                    <label for="name" class="inline-block !text-[#959ca9] text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Name *</label>
                    @error('name') <span style="color: red;">{{ $message }}</span> @enderror
                </div>
            </div>
            <!-- /column -->
            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[10px] max-w-full">
                <div class="form-floating relative !mb-4">
                    <input type="email" id="email" wire:model="email" class="form-control border-0 relative block w-full text-[.75rem] font-medium !text-[#60697b] bg-[#fefefe] bg-clip-padding shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] duration-[0.15s] ease-in-out focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] placeholder:!text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] !leading-[1.25]">
                    <label for="email" class="inline-block !text-[#959ca9] text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Email *</label>
                    @error('email') <span style="color: red;">{{ $message }}</span> @enderror
                </div>
            </div>
            <!-- /column -->
            <div class="w-full flex-[0_0_auto] px-[10px] max-w-full">
                <div class="form-floating relative !mb-4">
                    <textarea id="message" wire:model="message" class="form-control border-0 relative block w-full text-[.75rem] font-medium !text-[#60697b] bg-[#fefefe] bg-clip-padding shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] duration-[0.15s] ease-in-out focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] placeholder:!text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] !leading-[1.25]" style="height: 150px"></textarea>
                    <label for="message" class="inline-block !text-[#959ca9] text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Message *</label>
                    @error('message') <span style="color: red;">{{ $message }}</span> @enderror
                </div>
            </div>
            <!-- /column -->
            <div class="w-full flex-[0_0_auto] px-[10px] max-w-full">
                <button 
                    type="submit"
                    wire:loading.attr="disabled"
                    wire:target="submit"
                    class="btn btn-outline-primary !rounded-[50rem] btn-send !mb-3 flex items-center justify-center gap-2"
                >
                    <span wire:loading.remove wire:target="submit">Send message</span>
                    <span wire:loading wire:target="submit" class="flex items-center justify-center">
                        <svg class="animate-spin h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
        <!-- /.row -->
    </form>
</div>  