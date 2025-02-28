<?php
namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Comment;

class CommentCard extends Component
{
    public Comment $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function render()
    {
        return view('components.comment-card'); // Match new Blade file name
    }
}
