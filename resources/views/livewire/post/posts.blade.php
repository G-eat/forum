<div class="container">
    <div class="row">
        <div class="col-md-12">
            {{-- Search for a title,text or inside a comment --}}
            <x-search :message="$message ?? ''"></x-search>

            <x-posts :posts="$posts"></x-posts>

        </div>
    </div>
</div>