@props(['posts'])

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>Title</th>
                <th>Text</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr wire:key="{{ $post->id }}">
                        <td class="break-all">{{ Str::limit($post->title,30) }}</td>
                        <td class="break-all">{{ Str::limit($post->text,30) }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"><a href="{{ route('post.show',['id' => $post->id] )}}">Show</a></button>
                            @if(!$post->comments_count) 
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><a href="{{ route('user.update-post',['post' => $post->id] )}}">Edit</a></button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" wire:click="delete({{ $post->id }})">Delete</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>

          {{ $posts->links() }}
    </div>
</div>