@props(['post'])

<h1 class="card-title mb-0"><b>{{ $post->title}}</b></h1>
<p class="card-text"><small class="text-muted">Created at: {{ $post->created_at }} by {{ $post->user->name }}</small></p>
<hr>
<div class="card-text mt-2">{{ $post->text }}</div>
<br>


<a href="{{ route('post.index' )}}" class="text-decoration-underline text-secondary">Go back to posts</a>
@auth
    @if(auth()->user()->id === $post->user->id)
        <a href="{{ route('user.update-post',['post' => $post->id] )}}" class="text-decoration-underline float-end text-warning">Edit post</a>
    @endif
@endauth