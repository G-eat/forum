<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-3" style="font-size: 20px;font-weight:900">Update Post</h1>

                    <form wire:submit.prevent="update">
                        <div class="form-group mb-2">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" wire:model="title" required>
                            <div class="text-danger">@error('title') {{ $message }} @enderror</div>
                        </div>

                        <div class="form-group mb-2">
                            <label for="text">Text:</label>
                            <textarea class="form-control" id="text" rows="5" wire:model="text" required></textarea>
                            <div class="text-danger">@error('text') {{ $message }} @enderror</div>
                        </div>

                        <button type="submit" class="btn btn-primary" style="background: #0d6efd">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
