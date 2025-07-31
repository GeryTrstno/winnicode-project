<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class Footer extends Component
{
    public $categories;
    public $quickLinks;
    public $policies;
    public $hideFooterRoutes;
    public $shouldShowFooter;

    public function mount()
    {
        // Initialize variables in the mount method
        $this->hideFooterRoutes = ['settings'];
        $this->shouldShowFooter = !in_array(request()->route()->getName(), $this->hideFooterRoutes);

        $this->quickLinks = [
            ['name' => 'Dashboard', 'route' => 'home'],
            // ['name' => 'About Us', 'route' => 'about-us'],
            // ['name' => 'Profile', 'route' => 'profile'],
        ];

        $this->policies = [
            ['name' => 'Privacy Policy', 'path' => '/privacy-policy'],
            ['name' => 'Cookies Policy', 'path' => '/cookies'],
        ];
    }

    public function render()
    {
        // Fetch categories from the database
        $this->categories = Category::all();


        // Return the view with all the necessary data
        return view('livewire.footer', [
            'categories' => $this->categories,
            'quickLinks' => $this->quickLinks,
            'policies' => $this->policies,
            'shouldShowFooter' => $this->shouldShowFooter
        ]);
    }
}
