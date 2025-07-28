<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;

class DisplayProfile extends Component
{
    use WithFileUploads;

    public $editMode = false;
    public $name;
    public $username;
    public $bio;
    public $user;
    public $image;
    public $isFollowing;

    public function mount($user, $isFollowing = false)
    {
        $this->user = $user;
        $this->isFollowing = $isFollowing;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->bio = $user->profile->bio ?? '';
        $this->image = null;
    }

    public function editProfile()
    {
        $this->editMode = true;
    }

    public function cancelEdit()
    {
        $this->editMode = false;
        // Reset value ke data user terakhir
        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->bio = $this->user->profile->bio ?? '';
        $this->image = null;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $this->user->id,
            'bio' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $this->user->name = $this->name;
        $this->user->username = $this->username;
        $this->user->profile->bio = $this->bio;
        $this->user->profile->image = 'https://placehold.co/200x200?text=' . urlencode($this->user->name);

        $this->user->save();
        $this->user->profile->save();

        $this->editMode = false;

        session()->flash('success', __('Profile updated successfully.'));
        return redirect()->route('user.show', ['username' => $this->user->username]);
        // Untuk Livewire, cukup flash message, tidak perlu redirect
    }

    public function render()
    {
        return view('livewire.display-profile');
    }
}
