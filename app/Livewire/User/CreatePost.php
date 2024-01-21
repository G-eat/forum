<?php

namespace App\Livewire\User;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePost extends Component
{
    #[Validate('required|string|min:2|max:200')]
    public $title;

    #[Validate('required|string|min:20|max:5000')]
    public $text;


    public function render()
    {
        return view('livewire.user.create-post')
                    ->layout('layouts.app');;
    }

    public function create() 
    {
        // Gate to allow user to create comment
        $this->authorize('create-post');

        // Manual validation using the $rules property
        $this->validate();

        // Save the comment to the database
        Post::create([
            'title'     => $this->title,
            'text'      => $this->text,
            'user_id'   => auth()->id()
        ]);

        return redirect()->route('user.posts');
    }
}
