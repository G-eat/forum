<?php

namespace App\Console\Commands;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteInactivePosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:inactive-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all posts that have not received a comment for a year';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the current date and time
        $currentDateTime = Carbon::now();

        // Calculate the date one year ago
        $oneYearAgo = $currentDateTime->subYear();

        // Get all posts that are older that a years and received a comment for a year
        Post::where('created_at','<=',$oneYearAgo)->whereDoesntHave('comments', function ($query) use ($oneYearAgo) {
            $query->where('created_at', '>=', $oneYearAgo);
        })->delete();
    }
}
