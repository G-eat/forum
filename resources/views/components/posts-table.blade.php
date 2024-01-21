@props(['posts'])

<div class="row">
    <div class="col-md-12">
        <p class="text-gray-500 text-md"><span class="text-danger font-bold">*</span>Only posts that doesnt have any comments will have <span class="text-danger font-bold">EDIT</span> and <span class="text-danger font-bold">DELETE</span> buttons</p>
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
                            <a href="{{ route('post.show',['id' => $post->id] )}}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded float-start" style="margin: 0 5px 5px 0">Show</a>
                            @if(!$post->comments_count) 
                                <a href="{{ route('user.update-post',['post' => $post->id] )}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-start" style="margin: 0 5px 5px 0">Edit</a>
                                <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded cursor-pointer float-start" wire:click="delete({{ $post->id }})">Delete</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>

          {{ $posts->links() }}
    </div>
</div>