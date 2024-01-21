@props(['message'])

<div class="card mb-4">
    <div class="card-body">
        <input wire:model="search" wire:keyup="searchInput" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-100">
        <div class="text-danger">@error('search') {{ $message }} @enderror</div>
    </div>
</div>