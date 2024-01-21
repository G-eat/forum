<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class ShowPost extends Component
{
    public $post;

    public function mount($id)
    {
        $this->post = Post::select('id','title','text','user_id','created_at')->withCount('comments')->whereId($id)->with('user:id,name')->first();
    }

    public function render()
    {
        return view('livewire.post.show-post')
                    ->layout('layouts.frontend');
    }
}
