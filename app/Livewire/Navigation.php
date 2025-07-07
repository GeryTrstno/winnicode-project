<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\News;
use Livewire\Component;

class Navigation extends Component
{
    public $categories;

    public function render()
    {
        $this->categories = Category::all();
        return view('partials.navigation', [
            'categories' => $this->categories,
        ]);
    }
}
