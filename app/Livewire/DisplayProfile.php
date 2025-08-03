<?php

namespace App\Livewire;

use App\Models\Follow;
use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class DisplayProfile extends Component
{
    use WithFileUploads;

    public $editMode = false;
    public $name;
    public $username;
    public $bio;
    public $profileImage;
    public $coverImage;
    public $user;
    public $isFollowing;

    public function mount($user, $isFollowing = false)
    {
        $this->user = $user;
        $this->isFollowing = $isFollowing;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->bio = $user->profile->bio ?? '';
        // Tidak set profileImage dan coverImage di mount agar tidak konflik dengan file upload
    }

    public function editProfile()
    {
        $this->editMode = true;
        // Reset file uploads ketika masuk edit mode
        $this->profileImage = null;
        $this->coverImage = null;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $this->user->id,
            'bio' => 'nullable|string|max:255',
            'profileImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Max 2MB
            'coverImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',  // Max 5MB
        ]);

        // Update nama, username, dan bio
        $this->user->name = $this->name;
        $this->user->username = $this->username;
        $this->user->profile->bio = $this->bio;

        // Menangani gambar profil
        if ($this->profileImage && is_object($this->profileImage)) {
            // Hapus gambar lama jika ada
            if ($this->user->profile->image && Storage::exists('public/' . $this->user->profile->image)) {
                Storage::delete('public/' . $this->user->profile->image);
            }
            $profileImagePath = $this->profileImage->store('profile_images', 'public');
            $this->user->profile->image = $profileImagePath;
        }

        // Menangani gambar sampul
        if ($this->coverImage && is_object($this->coverImage)) {
            // Hapus gambar lama jika ada
            if ($this->user->profile->cover_image && Storage::exists('public/' . $this->user->profile->cover_image)) {
                Storage::delete('public/' . $this->user->profile->cover_image);
            }
            $coverImagePath = $this->coverImage->store('cover_images', 'public');
            $this->user->profile->cover_image = $coverImagePath;
        }

        // Simpan perubahan
        $this->user->save();
        $this->user->profile->save();

        // Reset edit mode dan file uploads
        $this->editMode = false;
        $this->profileImage = null;
        $this->coverImage = null;

        session()->flash('message', __('Profile updated successfully.'));

        // Refresh user data
        $this->user->refresh();
        $this->user->load('profile');

        return redirect()->route('user.show', ['username' => $this->user->username]);
    }

    public function cancelEdit()
    {
        $this->editMode = false;
        // Reset nilai ke data pengguna yang terakhir
        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->bio = $this->user->profile->bio ?? '';
        $this->profileImage = null;
        $this->coverImage = null;
    }

    public function removeProfileImage()
    {
        if ($this->user->profile->image && Storage::exists('public/' . $this->user->profile->image)) {
            Storage::delete('public/' . $this->user->profile->image);
        }
        $this->user->profile->image = null;
        $this->user->profile->save();
        $this->profileImage = null;
    }

    public function removeCoverImage()
    {
        if ($this->user->profile->cover_image && Storage::exists('public/' . $this->user->profile->cover_image)) {
            Storage::delete('public/' . $this->user->profile->cover_image);
        }
        $this->user->profile->cover_image = null;
        $this->user->profile->save();
        $this->coverImage = null;
    }

    public function render()
    {
        $followers = Follow::where('following_id', $this->user->id)->get();
        $following = Follow::where('follower_id', $this->user->id)->get();

        $followersCount = Follow::where('following_id', $this->user->id)->count();
        $followingCount = Follow::where('follower_id', $this->user->id)->count();


        return view('livewire.display-profile', [
            'follower' => $followers,
            'following' => $following,
            'followersCount' => $followersCount,
            'followingCount' => $followingCount
        ]);
    }
}
