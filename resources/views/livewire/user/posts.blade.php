<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All user posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <span class="text-2xl font-extrabold">All user posts</span>
                    @can('create-post')
                        <a href="{{ route('user.create-post') }}" class="text-blue-500 hover:text-blue-700 font-bold py-2 px-4 border border-blue-500 rounded float-end">Add post</a>
                    @else
                        <span class="float-end">To create a post you need to <a href="{{ route('verification.notice') }}" class="text-decoration-underline text-primary">verify email.</a></span>
                    @endcan
                    
                    <br><br>
                    <x-posts-table :posts="$posts"></x-posts-table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
