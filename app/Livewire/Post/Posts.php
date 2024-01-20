<?php

namespace App\Livewire\Post;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post as ModelsPost;

class Posts extends Component
{

    use WithPagination;

    public function render()
    {
        $posts = ModelsPost::select('id','title','text','user_id','created_at')->with('user:id,name')->withCount('comments')->orderBy('created_at','DESC')->paginate(15);

        return view('livewire.post.posts', [
            'posts' => $posts
        ]);
    }
}

