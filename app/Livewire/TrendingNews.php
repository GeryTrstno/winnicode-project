<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;

class TrendingNews extends Component
{
    public $news;
    public $categories;

    public function render()
    {
        $this->news = News::with('categories')
            ->latest()
            ->take(3)
            ->get();

        $this->categories = $this->news->pluck('categories')->flatten()->unique('id');

        return view('livewire.trending-news', [
            'news' => $this->news,
            'categories' => $this->categories,
        ]);
    }
}
