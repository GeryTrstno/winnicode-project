<?php

namespace App\Livewire;

use Livewire\Component;

class EditProfile extends Component
{
    public $user;
    public $name;
    public $username;
    public $bio;

    public function mount($user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->bio = $user->profile->bio ?? '';
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $this->user->id,
            'bio' => 'nullable|string|max:255',
        ]);

        $this->user->name = $this->name;
        $this->user->username = $this->username;
        $this->user->profile->bio = $this->bio;
        $this->user->save();
        $this->user->profile->save();

        session()->flash('success', 'Profile updated!');

        return redirect()->route('profile', ['user' => $this->user->username]);
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
