<div>

    @auth
        @can('create-comment')
            <x-create-comment></x-create-comment>
        @else
            <p class="mb-3">To leave a comment you need to <a href="{{ route('verification.notice') }}" class="text-decoration-underline text-primary">verify email.</a></p>
            <hr>
        @endcan      
    @else
        <a href="{{ route('login') }}" class="text-decoration-underline text-primary">Login to comment</a>
    @endauth

    <h1 style="font-size: 20px;font-weight:700" class="mt-2 mb-2">All comments</h1>

    @forelse ($comments as $comment)
        <div class="card" wire:key="{{ $comment->id }}">
            <div class="card-body">
                @if ($editingCommentId == $comment->id)
                    <div class="form-group">
                        <textarea wire:model="newComment" class="form-control" id="comment" name="comment" rows="4" required></textarea>
                        <div class="text-danger">@error('newComment') {{ $message }} @enderror</div>
                    </div>
                    <a wire:click="update({{ $comment->id }})" class="btn btn-primary mt-1 p-1" style="float: left;cursor:pointer">Update</a>
                @else
                    <p class="card-text"><small class="text-muted">Created at: {{ $comment->created_at }} by {{ $comment->user->name }}</small></p>
                    <hr>
                    <div class="card-text mt-2">{{ $comment->text }}</div>
                    <br>
                @endif

                @auth
                    @if(auth()->user()->id === $comment->user_id)
                        <a wire:click="delete({{ $comment->id }})" class="text-decoration-underline text-danger ml-3" style="float: right;cursor:pointer">Delete</a>
                        <a wire:click="editMode({{ $comment->id }},'{{ $comment->text }}')" class="text-decoration-underline text-warning cursor-pointer" style="float: right;cursor:pointer">Edit</a>
                    @endif
                @endauth
            </div>
        </div>
        <br>
    @empty
        <p class="text-muted">No commets yet.</p>
    @endforelse

    {{ $comments->links() }}
</div>
