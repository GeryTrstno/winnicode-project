<?php

namespace App\Livewire;

use App\Models\Category;
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
