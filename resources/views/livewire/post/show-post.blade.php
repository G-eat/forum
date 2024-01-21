<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title mb-0"><b>{{ $post->title}}</b></h1>
                        <p class="card-text"><small class="text-muted">Created at: {{ $post->created_at }} by {{ $post->user->name }}</small></p>
                        <hr>
                        <div class="card-text mt-2">{{ $post->text }}</div>
                        <br>


                        <a href="{{ route('post.index' )}}" class="text-decoration-underline text-secondary">Go back to posts</a>
                        @auth
                            @if(auth()->user()->id === $post->user->id)
                                <a href="{{ route('user.update-post',['post' => $post->id] )}}" class="text-decoration-underline text-warning" style="float: right">Edit post</a>
                            @endif
                        @endauth
                    </div>
                </div>
                <br>

                {{-- comments --}}
                <div class="card">
                    <div class="card-body">
                        <livewire:comment.comments :postId="$post->id">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>