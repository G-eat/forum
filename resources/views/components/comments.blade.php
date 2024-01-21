@props(['comments', 'editingCommentId', 'message'])

@forelse ($comments as $comment)
    <div class="card" wire:key="{{ $comment->id }}">
        <div class="card-body">
            @if ($editingCommentId == $comment->id)
                <div class="form-group">
                    <textarea wire:model="newComment" class="form-control" id="comment" name="comment" rows="4" required></textarea>
                    <div class="text-danger">@error('newComment') {{ $message }} @enderror</div>
                </div>
                <a wire:click="update({{ $comment->id }})" class="bg-blue-500 hover:bg-blue-700 text-white rounded cursor-pointer p-1">Update</a>
            @else
                <p class="card-text"><small class="text-muted">Created at: {{ $comment->created_at }} by {{ $comment->user->name }}</small></p>
                <hr>
                <div class="card-text mt-2">{{ $comment->text }}</div>
                <br>
            @endif

            @auth
                @if(auth()->user()->id === $comment->user_id)
                    <a wire:click="delete({{ $comment->id }})" class="text-decoration-underline float-end cursor-pointer text-danger ml-3">Delete</a>
                    <a wire:click="editMode({{ $comment->id }},'{{ $comment->text }}')" class="text-decoration-underline float-end cursor-pointer text-warning cursor-pointer">Edit</a>
                @endif
            @endauth
        </div>
    </div>
    <br>
@empty
    <p class="text-muted">No commets yet.</p>
@endforelse

{{ $comments->links() }}