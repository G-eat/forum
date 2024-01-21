<?php

namespace App\Livewire\Post;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post as ModelsPost;
use Livewire\Attributes\Validate;

class Posts extends Component
{
    use WithPagination;

    #[Validate('sometimes|string')]
    public $search = '';

    public function render()
    {
        $posts = ModelsPost::select('id','title','text','user_id','created_at')
                                ->withCount('comments')
                                ->with('comments:id,text,post_id')
                                ->with('user:id,name')
                                ->where('title', 'like', '%' . $this->search . '%')
                                ->orWhere('text', 'like', '%' . $this->search . '%')
                                ->orWhereHas('comments', function ($query) {
                                    $query->where('text', 'like', '%' . $this->search . '%');
                                })
                                ->orderBy('created_at','DESC')
                                ->paginate(15);

        return view('livewire.post.posts', [
            'posts' => $posts
        ])
        ->layout('layouts.frontend');
    }

    public function searchInput()
    {
        $this->validate();
        $this->resetPage();
    }

}

