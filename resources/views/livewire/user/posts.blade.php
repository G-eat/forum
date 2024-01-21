<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All user posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <span style="font-size: 20px;font-weight:900">All user posts</span>
                    @can('create-post')
                        <a href="{{ route('user.create-post') }}" class="btn btn-outline-primary" style="float: right">Add post</a>
                    @else
                        <span style="float: right">To create a post you need to <a href="{{ route('verification.notice') }}" class="text-decoration-underline text-primary">verify email.</a></span>
                    @endcan
                    
                    <br><br>
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
                                        <tr>
                                            <td style="word-break: break-all">{{ Str::limit($post->title,30) }}</td>
                                            <td style="word-break: break-all">{{ Str::limit($post->text,30) }}</td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>
                                                <button class="btn btn-secondary"><a href="{{ route('post.show',['id' => $post->id] )}}">Show</a></button>
                                                @if(!$post->comments_count) 
                                                    <button class="btn btn-primary"><a href="{{ route('user.update-post',['post' => $post->id] )}}">Edit</a></button>
                                                    <button wire:click="delete({{ $post->id }})" class="btn btn-danger">Delete</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>

                              {{ $posts->links() }}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
