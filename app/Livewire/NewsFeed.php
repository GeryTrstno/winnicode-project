<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;

class NewsFeed extends Component
{

    public $itemcount = 16;
    public $totalItems;
    public $news;
    public $hasMorePages = true;


    public function mount()
    {
        $this->totalItems = News::count();
    }

    public function loadMore()
    {
        $this->itemcount += 16;

        if ($this->itemcount >= $this->totalItems) {
            $this->hasMorePages = false;
        }

    }

    public function render()
    {
        $this->news = News::with('categories')->latest()->take($this->itemcount)->get();

        return view('livewire.news-feed', [
            'news' => $this->news,
            'hasMorePages' => $this->hasMorePages,
        ]);
    }
}
