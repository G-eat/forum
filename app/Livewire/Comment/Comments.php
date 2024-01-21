<?php

namespace App\Livewire\Comment;

use App\Models\Comment;
use App\Notifications\NewCommentNotification;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public $postId;

    #[Validate('required|string|min:2|max:200')]
    public $comment;

    #[Validate('required|string|min:2|max:200')]
    public $newComment;

    public $editingCommentId;

    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function render()
    {
        $comments = Comment::where('post_id',$this->postId)->select('id','text','post_id','user_id','created_at')->with('user:id,name')->orderBy('created_at','DESC')->paginate(10);;

        return view('livewire.comment.comments',[
            'comments' => $comments
        ]);
    }

    public function create()
    {
        // gate to allow user to create comment
        $this->authorize('create-comment');

        // Manual validation using the $rules property
        $this->validateOnly('comment');

        // Save the comment to the database
        $comment = Comment::create([
            'text'      => $this->comment,
            'user_id'   => auth()->id(),
            'post_id'   => $this->postId
        ]);

        // send author of the post an email that one new comment its added
        /* $comment->user->notify(new NewCommentNotification($comment)); */

        // Reset the comment field after saving
        $this->comment = '';

        $this->resetPage();
    }

    public function editMode($id, $value)
    {
        $this->newComment = $value;
        $this->editingCommentId = $id;
    }

    public function update($id)
    {
        $this->validateOnly('newComment');

        // Update the comment to the database
        Comment::whereId($id)->where('user_id',auth()->id())->update([
            'text'      => $this->newComment,
            'edited_at' => now()
        ]);

        // Reset field after saving
        $this->editingCommentId = '';

        $this->resetPage();
    }

    public function delete($id) 
    {
        Comment::whereId($id)->where('user_id',auth()->id())->delete();
    }
}
