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
    public $subcategoryId;

    public function mount($categoryId = null, $subcategoryId = null)
    {
        $this->categoryId = $categoryId;
        $this->subcategoryId = $subcategoryId;

        $this->totalItems = News::when($categoryId, function($q) {
                $q->whereHas('categories', function($q2) {
                    $q2->where('categories.id', $this->categoryId);
                });
            })
            ->when($subcategoryId, function($q) {
                $q->whereHas('subcategories', function($q2) {
                    $q2->where('subcategories.id', $this->subcategoryId);
                });
            })
            ->count();
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
        $query = News::with(['categories', 'subcategories'])->latest();

        if ($this->categoryId) {
            $query->whereHas('categories', function($q) {
                $q->where('categories.id', $this->categoryId);
            });
        }

        if ($this->subcategoryId) {
            $query->whereHas('subcategories', function($q) {
                $q->where('subcategories.id', $this->subcategoryId);
            });
        }

        $this->news = $query->take($this->itemcount)->get();

        return view('livewire.news-feed', [
            'news' => $this->news,
            'hasMorePages' => $this->hasMorePages,
        ]);
    }
}
