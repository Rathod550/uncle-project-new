<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Contact Us View') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('View Your Contact Us') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="container mx-auto p-4">

        <!-- Back Button -->
        <div class="flex justify-end mb-4">
          <a href="{{ route('contact-us.index') }}" id="backBtn" class="bg-green-600 text-white text-sm px-3 py-1 rounded hover:bg-green-700 flex items-center" wire:navigate>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-1">
                <path d="M7.712 4.818A1.5 1.5 0 0 1 10 6.095v2.972c.104-.13.234-.248.389-.343l6.323-3.906A1.5 1.5 0 0 1 19 6.095v7.81a1.5 1.5 0 0 1-2.288 1.276l-6.323-3.905a1.505 1.505 0 0 1-.389-.344v2.973a1.5 1.5 0 0 1-2.288 1.276l-6.323-3.905a1.5 1.5 0 0 1 0-2.552l6.323-3.906Z" />
            </svg>Back
          </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"><strong>Name :</strong></th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $contactUs->name ?? '' }}</th>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"><strong>Contact Number :</strong></th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $contactUs->contact_number ?? '' }}</th>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email :</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">{{ $contactUs->email ?? '' }}</th>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"><strong>Contact Us Category :</strong></th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $contactUs->category->name ?? '' }}</th>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"><strong>Message :</strong></th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">{{ $contactUs->message ?? '' }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>