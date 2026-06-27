<div class="max-w-6xl mx-auto px-4 py-10">
    <!-- Header -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-800 tracking-wide">Uncle Project</h1>
        <p class="text-gray-500 text-sm uppercase mt-1">Insert</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg flex flex-col lg:flex-row overflow-hidden">
        <!-- Left: Inputs -->
        <div class="w-full lg:w-8/12 p-8 space-y-6 border-r border-gray-100">
            <div class="space-y-4">
                <!-- Purchase Price -->
                <div>
                    <label class="text-sm font-semibold text-gray-700 block mb-1">Purchase Price</label>
                    <input type="number" wire:model.live="purchasePrice" class="w-full border rounded-md px-3 py-2 text-sm shadow-sm focus:ring focus:ring-blue-100">
                </div>

                <!-- Mortgage Term -->
                <div>
                    <label class="text-sm font-semibold text-gray-700 block mb-1">Mortgage Term (Years)</label>
                    <input type="number" wire:model.live="mortgageTerm" class="w-full border rounded-md px-3 py-2 text-sm shadow-sm focus:ring focus:ring-blue-100">
                </div>

                <!-- Down Payment -->
                <div x-data="{ value: @entangle('downPayment') }">
                    <label class="text-sm font-semibold text-gray-700 block mb-1">Down Payment (₹)</label>
                    <input type="range" min="0" max="100000" step="500" x-model="value"
                           wire:model.live="downPayment"
                           class="w-full h-2 rounded-lg bg-blue-200 accent-blue-600">
                    <div class="text-sm text-gray-700 mt-1">₹<span x-text="value"></span></div>
                </div>

                <!-- Annual Taxes -->
                <div x-data="{ value: @entangle('annualTaxes') }">
                    <label class="text-sm font-semibold text-gray-700 block mb-1">Annual Taxes (₹)</label>
                    <input type="range" min="0" max="50000" step="500" x-model="value"
                           wire:model.live="annualTaxes"
                           class="w-full h-2 rounded-lg bg-blue-200 accent-blue-600">
                    <div class="text-sm text-gray-700 mt-1">₹<span x-text="value"></span></div>
                </div>

                <!-- Interest Rate -->
                <div x-data="{ value: @entangle('interestRate') }">
                    <label class="text-sm font-semibold text-gray-700 block mb-1">Interest Rate (%)</label>
                    <input type="range" min="1" max="30" step="0.01" x-model="value"
                           wire:model.live="interestRate"
                           class="w-full h-2 rounded-lg bg-blue-200 accent-blue-600">
                    <div class="text-sm text-gray-700 mt-1"><span x-text="value"></span>%</div>
                </div>

                <!-- Annual Insurance -->
                <div>
                    <label class="text-sm font-semibold text-gray-700 block mb-1">Annual Insurance (₹)</label>
                    <input type="number" wire:model.live="annualInsurance" class="w-full border rounded-md px-3 py-2 text-sm shadow-sm focus:ring focus:ring-blue-100">
                </div>

                <!-- Monthly HOA -->
                <div>
                    <label class="text-sm font-semibold text-gray-700 block mb-1">Monthly HOA (₹)</label>
                    <input type="number" wire:model.live="monthlyHOA" class="w-full border rounded-md px-3 py-2 text-sm shadow-sm focus:ring focus:ring-blue-100">
                </div>

                <!-- Email -->
                <div>
                    <label class="text-sm font-semibold text-gray-700 block mb-1">Want a Copy of the Results?</label>
                    <input type="email" wire:model.live="email" placeholder="Enter your email address"
                           class="w-full border rounded-md px-3 py-2 text-sm shadow-sm focus:ring focus:ring-blue-100">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Right: Summary -->
        <div class="w-full lg:w-4/12 p-8 bg-gray-50">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-gray-800">₹{{ number_format($paymentDetails['totalPayment'], 2) }}</h2>
                <p class="text-sm text-gray-500 uppercase mt-1">Monthly Payment</p>
            </div>

            <div class="space-y-4 text-sm text-gray-700">
                <div class="flex justify-between">
                    <span>Principal & Interest:</span>
                    <span>₹{{ number_format($paymentDetails['principalInterest'], 2) }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Monthly Taxes:</span>
                    <span>₹{{ number_format($paymentDetails['monthlyTaxes'], 2) }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Monthly HOA:</span>
                    <span>₹{{ number_format($monthlyHOA, 2) }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Monthly Insurance:</span>
                    <span>₹{{ number_format($paymentDetails['monthlyInsurance'], 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
