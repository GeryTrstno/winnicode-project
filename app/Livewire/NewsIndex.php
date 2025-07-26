<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;

class NewsIndex extends Component
{
    public $news;
    public $itemCount = 16;
    public $totalItems;
    public $hasMorePages = true;

    public $userId;
    public $categoryId;
    public $subcategoryId;

    public function mount($userId = null, $categoryId = null, $subcategoryId = null)
    {
        $this->userId = $userId;
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
            ->when($userId, function($q) {
                // Memastikan kita memfilter berdasarkan userId
                $q->where('user_id', $this->userId); // Asumsi news memiliki user_id
            })
            ->count();
    }

    public function loadMore()
    {
        $this->itemCount += 16;

        if ($this->itemCount >= $this->totalItems) {
            $this->hasMorePages = false;
        }
    }

    public function render()
    {
        $query = News::with(['categories', 'subcategories'])->latest();

        if ($this->categoryId)
        {
            $query->whereHas('categories', function($q) {
                $q->where('categories.id', $this->categoryId);
            });
        }

        if ($this->subcategoryId)
        {
            $query->whereHas('subcategories', function($q) {
                $q->where('subcategories.id', $this->subcategoryId);
            });
        }

        if ($this->userId)
        {
            $query->where('user_id', $this->userId);
        }

        $this->news = $query->take($this->itemCount)->get();

        if ($this->news->count() < $this->itemCount) {
            $this->hasMorePages = false; // Jika jumlah berita kurang dari itemcount, tidak ada halaman lagi
        }

        return view('livewire.news-index', [
            'news' => $this->news,
            'hasMorePages' => $this->hasMorePages,
        ]);
    }
}
