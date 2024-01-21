<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{-- Show post --}}
                    <x-show-post :post="$post"></x-show-post>
                </div>
            </div>
            <br>

            {{-- Comments --}}
            <div class="card">
                <div class="card-body">
                    <livewire:comment.comments :postId="$post->id">
                </div>
            </div>

        </div>
    </div>
</div>