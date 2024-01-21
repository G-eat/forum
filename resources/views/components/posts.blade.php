@props(['posts'])

@forelse ($posts as $post)
    <div class="card" wire:key="{{ $post->id }}">
        <div class="card-body">
            <h1 class="card-title mb-0"><b><a href="{{ route('post.show',['id' => $post->id]) }}">{{ $post->title}}</a></b></h1>
            <p class="card-text"><small class="text-muted">Created at: {{ $post->created_at }} by {{ $post->user->name }} | {{ $post->comments_count }} {{ Str::plural('comment', $post->comments_count) }}</small></p>
            <hr>
            <div class="card-text mt-2">{{ Str::limit($post->text,200) }}</div>
            <br>
            <a href="{{ route('post.show',['id' => $post->id]) }}" class="text-decoration-underline text-muted">Read more</a>

            @auth
                @if(auth()->user()->id === $post->user->id)
                    <a href="{{ route('user.update-post',['post' => $post->id] )}}" class="text-decoration-underline float-end text-warning">Edit post</a>
                @endif
            @endauth
        </div>
    </div>
    <br>
@empty
    <p>There isnt any post yet.</p>
@endforelse 

{{ $posts->links() }}

<br>
<br>