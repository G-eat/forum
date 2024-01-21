<div>

    @auth
        @can('create-comment')
            <x-create-comment></x-create-comment>
        @else
            <p class="mb-3">To leave a comment you need to <a href="{{ route('verification.notice') }}" class="text-decoration-underline text-primary">verify email.</a></p>
            <hr class="border-t-2 border-gray-300 my-4">
        @endcan      
    @else
        <a href="{{ route('login') }}" class="text-decoration-underline text-primary">Login to comment</a>
    @endauth

    <h1 class="font-bold mt-2 mb-2">All comments</h1>

    <x-comments :comments="$comments" :editing__comment_id="$editingCommentId" :message="$message ?? ''"></x-comments>

</div>
