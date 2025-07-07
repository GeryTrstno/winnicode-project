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
    public $categoryId;

    public function mount($categoryId = null)
    {
        $this->categoryId = $categoryId;
        $this->totalItems = $categoryId
            ? News::whereHas('categories', function($q) {
                $q->where('categories.id', $this->categoryId);
            })->count()
            : News::count();
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
        $query = News::with('categories')->latest();

        if ($this->categoryId) {
            $query->whereHas('categories', function($q) {
                $q->where('categories.id', $this->categoryId);
            });
        }

        $this->news = $query->take($this->itemcount)->get();

        return view('livewire.news-feed', [
            'news' => $this->news,
            'hasMorePages' => $this->hasMorePages,
        ]);
    }
}
