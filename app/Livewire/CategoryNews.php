<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;

class CategoryNews extends Component
{

    public $news;

    public function render()
    {
        return view('livewire.category-news');
    }
}
