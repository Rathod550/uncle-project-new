<!-- Notification Section -->
@if(session()->has('message'))
    @php
        $type = session('message_type', 'success');
        $colors = [
            'create' => 'bg-green-500',
            'update' => 'bg-green-500',
            'delete' => 'bg-green-500',
            'error' => 'bg-red-500',
        ];
        $icons = [
            'create' => 'fa-plus-circle',
            'update' => 'fa-edit',
            'delete' => 'fa-trash-alt',
            'error' => 'fa-times',
        ];
        $defaultColor = 'bg-green-500';
        $defaultIcon = 'fa-check-circle';
    @endphp

    <div class="fixed top-4 right-4 z-50 transition-all duration-300 transform"
         x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 5000)"
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-x-full"
         x-transition:enter-end="opacity-100 translate-x-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-x-0"
         x-transition:leave-end="opacity-0 translate-x-full">
        <div class="{{ $colors[$type] ?? $defaultColor }} text-white px-6 py-4 rounded-lg shadow-lg flex items-center animate-fade-in">
            <i class="fas {{ $icons[$type] ?? $defaultIcon }} mr-3 text-xl"></i>
            <div>
                <p class="font-semibold">
                    @switch($type)
                        @case('create') Created @break
                        @case('update') Updated @break
                        @case('delete') Deleted @break
                        @case('error') Error @break
                        @default Success
                    @endswitch
                </p>
                <p class="text-sm">{{ session('message') }}</p>
            </div>
            <button @click="show = false" class="ml-6 focus:outline-none">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
@endif