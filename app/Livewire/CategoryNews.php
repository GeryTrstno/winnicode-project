<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryNews extends Component
{
    public $categories;
    public $selectedCategoryId = null;

    public function mount()
    {
        $this->categories = Category::with('news')->get();

        // Set kategori pertama sebagai default
        if ($this->categories->isNotEmpty()) {
            $this->selectedCategoryId = $this->categories->first()->id;
        }
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategoryId = $categoryId;
    }

    public function getSelectedNewsProperty()
    {
        if (!$this->selectedCategoryId) {
            return collect();  // Kembalikan koleksi kosong jika tidak ada kategori yang dipilih
        }

        // Cari kategori berdasarkan ID yang dipilih
        $category = $this->categories->find($this->selectedCategoryId);

        // Ambil berita untuk kategori tersebut
        return $category ? $category->news->shuffle()->take(6) : collect();
    }


    public function render()
    {
        return view('livewire.category-news', [
            'categories' => $this->categories,
        ]);
    }
}
