<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;

class NewsIndex extends Component
{
    public $itemcount = 16;
    public $totalItems;
    public $news;
    public $hasMorePages = true;
    public $categoryId;
    public $subcategoryId;
    public $userId;

    public function mount($categoryId = null, $subcategoryId = null, $userId = null)
    {
        $this->categoryId = $categoryId;
        $this->subcategoryId = $subcategoryId;
        $this->userId = $userId;

        // Hitung total berita berdasarkan filter yang diterapkan
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
        $this->itemcount += 16;

        if ($this->itemcount >= $this->totalItems) {
            $this->hasMorePages = false;
        }
    }

    public function render()
    {
        // Memulai query dengan relasi yang diperlukan
        $query = News::with(['categories', 'subcategories'])->latest();

        // Filter berdasarkan categoryId jika ada
        if ($this->categoryId) {
            $query->whereHas('categories', function($q) {
                $q->where('categories.id', $this->categoryId);
            });
        }

        // Filter berdasarkan subcategoryId jika ada
        if ($this->subcategoryId) {
            $query->whereHas('subcategories', function($q) {
                $q->where('subcategories.id', $this->subcategoryId);
            });
        }

        // Filter berdasarkan userId jika ada
        if ($this->userId) {
            $query->where('user_id', $this->userId); // Memastikan kita memfilter berita berdasarkan user_id
        }

        // Ambil berita dengan batasan itemcount
        $this->news = $query->take($this->itemcount)->get();

        // Mengecek jika jumlah berita lebih sedikit dari itemcount
        if ($this->news->count() < $this->itemcount) {
            $this->hasMorePages = false; // Jika jumlah berita kurang dari itemcount, tidak ada halaman lagi
        }

        return view('livewire.news-index', [
            'news' => $this->news,
            'hasMorePages' => $this->hasMorePages,
        ]);
    }
}
