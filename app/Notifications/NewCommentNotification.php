<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCommentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $comment;

    /**
     * Create a new notification instance.
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $postTitle = $this->comment->post->title;
        $commentAuthor = $this->comment->user->name;
        $commentBody = $this->comment->text;
        $commentAuthorEmail = $this->comment->user->email;
        $postUrl = route('post.show', ['id' => $this->comment->post->id]);

        return (new MailMessage)
                    ->line("New comment on your post '{$postTitle}' by {$commentAuthor} ({$commentAuthorEmail}):")
                    ->line("'" . $commentBody . "'")
                    ->action('View Post', url($postUrl))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
