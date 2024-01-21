<?php

namespace App\Livewire\User;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public function render()
    {
        $posts = Post::select('id','title','text','created_at','user_id')->withCount('comments')->where('user_id',auth()->id())->orderBy('created_at', 'DESC')->paginate(15);


        return view('livewire.user.posts',[
                    'posts' => $posts
                ])
                ->layout('layouts.app');
    }

    public function delete($id)
    {
        Post::whereId($id)->where('user_id', auth()->id())->whereDoesntHave('comments')->delete();

        $this->resetPage();
    }
}
