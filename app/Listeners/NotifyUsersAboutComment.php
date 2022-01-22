<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\CommentPosted;
use App\Jobs\ThrottledMail;
use App\Mail\CommentPostedMarkdown;
use App\Jobs\NotifyUsersPostWasCommented;

class NotifyUsersAboutComment
{
    public function handle(CommentPosted $event)
    {
        // dd('I was called in response to an event');
        ThrottledMail::dispatch(
            new CommentPostedMarkdown($event->comment), 
            $event->comment->commentable->user
        )->onQueue('low');
        NotifyUsersPostWasCommented::dispatch($event->comment)
            ->onQueue('high');
    }
}
