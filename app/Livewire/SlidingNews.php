<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;

class SlidingNews extends Component
{
    public $news;

    public function render()
    {
        $this->news = News::all()
            ->sortByDesc('created_at')
            ->take(3);
        return view('livewire.sliding-news', ['news' => $this->news]);
    }
}
