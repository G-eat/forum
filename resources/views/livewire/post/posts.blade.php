<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @forelse ($posts as $post)
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title mb-0"><b><a href="#">{{ $post->title}}</a></b></h1>
                            <p class="card-text"><small class="text-muted">Created at: {{ $post->created_at }} by {{ $post->user->name }} | {{ $post->comments_count }} {{ Str::plural('comment', $post->comments_count) }}</small></p>
                            <hr>
                            <div class="card-text mt-2">{{ Str::limit($post->text,200) }}</div>
                            <br>
                            <a href="#" class="text-decoration-underline text-muted">Read more</a>

                            @auth
                                @if(auth()->user()->id === $post->user->id)
                                    <a href="#" class="text-decoration-underline text-warning" style="float: right">Edit post</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                    <br>
                @empty
                    <p>There isnt any post yet.</p>
                @endforelse 
            </div>
        </div>
    </div>

    {{ $posts->links() }}
</div>