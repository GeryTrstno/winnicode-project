<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;
use App\Models\Comment;

class CommentsSection extends Component
{
    public $newsId;

    public function mount($newsId = null)
    {
        $this->newsId = $newsId;
    }

    public function render()
    {
        $comments = Comment::where('news_id', $this->newsId)->orderBy('created_at', 'desc')->get();

        $commentsReply = Comment::where('news_id', $this->newsId)
            ->whereNotNull('parent_comment_id') // Pastikan untuk memeriksa nilai yang sesuai
            ->orderBy('created_at', 'asc')

            ->get();

        return view('livewire.comments-section', [
            'comments' => $comments,
            'commentsReply' => $commentsReply,
        ]);
    }
}
