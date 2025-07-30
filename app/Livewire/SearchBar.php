<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class SearchBar extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.search-bar',
            [
                'categories' => $categories,
            ]
        );
    }
}
