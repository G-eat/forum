<?php

namespace App\Livewire\User;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdatePost extends Component
{
    #[Validate('required|string|min:2|max:200')]
    public $title;

    #[Validate('required|string|min:20|max:5000')]
    public $text;

    public $id;

    public function mount(Post $post)
    {
        $this->id = $post->id;
        $this->title = $post->title;
        $this->text = $post->text;
    }

    public function render()
    {
        return view('livewire.user.update-post')
                    ->layout('layouts.app');;
    }

    public function update()
    {
        $this->validate();

        $postDoesntHaveAnyComment = Post::whereId($this->id)->where('user_id', auth()->id())->whereDoesntHave('comments')->exists();

        if($postDoesntHaveAnyComment) {
            // Update the comment to the database
            Post::whereId($this->id)->where('user_id',auth()->id())->update([
                'title'     => $this->title,
                'text'      => $this->text,
            ]);
        }

        return redirect()->route('user.posts');
    }
}
