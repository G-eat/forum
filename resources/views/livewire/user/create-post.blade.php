<div class="py-12">
    <div class="container mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{-- Create post --}}
                <x-create-and-update-post title="Create Post" method_type="create" button_text="Create" :message="$message ?? ''"></x-create-and-update-post>
            </div>
        </div>
    </div>
</div>
