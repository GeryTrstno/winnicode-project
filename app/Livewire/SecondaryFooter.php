<?php

namespace App\Livewire;

use Livewire\Component;

class SecondaryFooter extends Component
{
    public $policies;

    public function mount()
    {
        $this->policies = [
            ['name' => 'Privacy Policy', 'path' => '/privacy-policy'],
            ['name' => 'Terms of Services', 'path' => '/terms'],
            ['name' => 'Cookies Policy', 'path' => '/cookies'],
        ];
    }


    public function render()
    {
        return view('livewire.secondary-footer', [
            'policies' => $this->policies,
        ]);
    }
}
