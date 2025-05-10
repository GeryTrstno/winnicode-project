<?php

namespace App\Livewire;

use Livewire\Component;

class NewsFeed extends Component
{
    public $itemcount = 16;
    public $totalItems = 80;
    public $hasMorePages = true;

    public function loadMore()
    {
        $this->itemcount += 16;

        if ($this->itemcount >= $this->totalItems) {
            $this->hasMorePages = false;
        }

    }

    public function render()
    {
        return view('livewire.news-feed');
    }
}
