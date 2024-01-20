@props(['comment' => ''])

<form style="margin: 10px 0 30px 0;">
    <div class="form-group">
        <label for="comment">Your Comment:</label>
        <textarea wire:model="comment" class="form-control" id="comment" name="comment" rows="4" required></textarea>
        <div class="text-danger">@error('comment') {{ $message }} @enderror</div>
    </div>
    <br>

    <button wire:click.prevent="create" class="btn btn-primary" style="background: #0d6efd">Submit Comment</button>
</form>

<hr>   