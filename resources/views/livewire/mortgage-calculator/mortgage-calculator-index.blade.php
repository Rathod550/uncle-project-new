<div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl p-6">
    <!-- Header -->
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Uncle Project</h1>
        <p class="text-gray-600">INSERT</p>
    </div>

    <hr class="my-6">

    <!-- Calculator Inputs -->
    <div class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Purchase Price -->
            <div>
                <label for="purchasePrice" class="block text-sm font-medium text-gray-700">Purchase Price</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input wire:model.live="purchasePrice" type="number" id="purchasePrice" 
                           class="block w-full pr-12 sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <!-- Mortgage Term -->
            <div>
                <label for="mortgageTerm" class="block text-sm font-medium text-gray-700">Mortgage Term (Years)</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input wire:model.live="mortgageTerm" type="number" id="mortgageTerm" 
                           class="block w-full pr-12 sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <!-- Down Payment -->
            <div x-data="{ value: @entangle('downPayment') }">
                <label for="downPayment" class="block text-sm font-medium text-gray-700">Down Payment (₹)</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input wire:model.live="downPayment" type="range" id="downPayment" min="0" max="100000" step="500" x-model="value"
                        class="block w-full appearance-none h-2 bg-gray-300 rounded-md outline-none transition-all duration-200"
                        :style="'background: linear-gradient(to right, #3b82f6 0%, #3b82f6 ' + (value / 100000 * 100) + '%, #e5e7eb ' + (value / 100000 * 100) + '%, #e5e7eb 100%)'">
                </div>
                <div class="mt-1 text-sm text-gray-700" x-text="value"></div>
            </div>

            <!-- Annual Taxes -->
            <div x-data="{ value: @entangle('annualTaxes') }">
                <label for="annualTaxes" class="block text-sm font-medium text-gray-700">Annual Taxes (₹)</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input wire:model.live="annualTaxes" type="range" id="annualTaxes" min="0" max="50000" step="500" x-model="value"
                        class="block w-full appearance-none h-2 bg-gray-300 rounded-md outline-none transition-all duration-200"
                        :style="'background: linear-gradient(to right, #3b82f6 0%, #3b82f6 ' + (value / 50000 * 100) + '%, #e5e7eb ' + (value / 50000 * 100) + '%, #e5e7eb 100%)'">
                </div>
                <div class="mt-1 text-sm text-gray-700" x-text="value"></div>
            </div>

            <!-- Interest Rate -->
            <div x-data="{ value: @entangle('interestRate') }">
                <label for="interestRate" class="block text-sm font-medium text-gray-700">Interest Rate (%)</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input wire:model.live="interestRate" type="range" id="interestRate" min="1" max="30" step="0.01" x-model="value"
                        class="block w-full appearance-none h-2 bg-gray-300 rounded-md outline-none transition-all duration-200"
                        :style="'background: linear-gradient(to right, #3b82f6 0%, #3b82f6 ' + ((value - 1) / 29 * 100) + '%, #e5e7eb ' + ((value - 1) / 29 * 100) + '%, #e5e7eb 100%)'">
                </div>
                <div class="mt-1 text-sm text-gray-700" x-text="value"></div>
            </div>

            <!-- Annual Insurance -->
            <div>
                <label for="annualInsurance" class="block text-sm font-medium text-gray-700">Annual Insurance (₹)</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input wire:model.live="annualInsurance" type="number" id="annualInsurance" 
                           class="block w-full pr-12 sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <!-- Monthly HOA -->
            <div>
                <label for="monthlyHOA" class="block text-sm font-medium text-gray-700">Monthly HOA (₹)</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input wire:model.live="monthlyHOA" type="number" id="monthlyHOA" 
                           class="block w-full pr-12 sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
        </div>

        <hr class="my-6">

        <!-- Email Input (optional for sending results) -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Want a Copy of the Results?</label>
            <p class="text-xs text-gray-500 mb-1">Enter your email address</p>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input wire:model.live="email" type="email" id="email" 
                       class="block w-full pr-12 sm:text-sm border-gray-300 rounded-md">
            </div>
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
    </div>

    <!-- Results Section -->
    <div class="mt-8 text-center">
        <div class="text-4xl font-bold text-gray-800">
            ₹{{ number_format($paymentDetails['totalPayment'], 2) }}
        </div>
        <div class="text-gray-600 uppercase text-sm mt-2">Monthly Payment</div>

        <div class="mt-6 space-y-2 text-left">
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