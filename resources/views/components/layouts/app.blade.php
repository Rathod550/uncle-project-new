<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        {{-- include it for notifaction --}}
        @include('livewire.include.notification.notification')
        
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>
