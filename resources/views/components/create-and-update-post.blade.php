@props(['title', 'methodType','buttonText', 'message'])

<h1 class="text-2xl font-extrabold mb-3">{{ $title }}</h1>

<form wire:submit.prevent="{{ $methodType }}">
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

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ $buttonText }}</button>
</form>