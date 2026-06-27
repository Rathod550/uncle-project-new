<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-4">
        <!-- Header -->
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center sm:gap-3">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard Overview</h1>
        </div>

        <!-- Stats Cards -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Revenue Card -->
            <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-neutral-700 dark:bg-neutral-800 dark:hover:border-neutral-600">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-neutral-400">Total Users</p>
                        <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">$24,780</p>
                        <div class="mt-4">
                            <a href="{{ route('users.index') }}" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 hover:underline dark:text-blue-400 dark:hover:text-blue-300" wire:navigate>
                                View Details
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="rounded-lg bg-blue-100 p-3 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                        <x-heroicon-o-users class="h-6 w-6" />
                    </div>
                </div>
            </div>

            <!-- Customers Card -->
            <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-neutral-700 dark:bg-neutral-800 dark:hover:border-neutral-600">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-neutral-400">Total Blogs</p>
                        <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">1,429</p>
                        <div class="mt-4">
                            <a href="{{ route('blogs.index') }}" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 hover:underline dark:text-blue-400 dark:hover:text-blue-300" wire:navigate>
                                View Details
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="rounded-lg bg-green-100 p-3 text-green-600 dark:bg-green-900/30 dark:text-green-400">
                        <x-heroicon-o-chat-bubble-bottom-center-text class="h-6 w-6" />
                    </div>
                </div>
            </div>

            <!-- Projects Card -->
            <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-neutral-700 dark:bg-neutral-800 dark:hover:border-neutral-600">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-neutral-400">Total Posts</p>
                        <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">56</p>
                        <div class="mt-4">
                            <a href="{{ route('posts.index') }}" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 hover:underline dark:text-blue-400 dark:hover:text-blue-300" wire:navigate>
                                View Details
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="rounded-lg bg-purple-100 p-3 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">
                        <x-heroicon-o-clipboard-document-list class="h-6 w-6" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>