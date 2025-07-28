<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public $showEditProfile = false;
    public $isFollowing = false;

    public function show($user)
    {
        // Cek apakah parameter $user adalah ID (misalnya user1, user2, dst) atau username
        if (strpos($user, 'user') === 0) {
            // Ambil ID dari parameter user yang ada dalam format "user{id}"
            $userId = substr($user, 4); // Mengambil ID setelah "user"
            $user = User::findOrFail($userId); // Temukan pengguna berdasarkan ID
            if ($user->username) {
                abort(404);
            }
        } else {
            // Jika bukan format "user{id}", anggap sebagai username
            $user = User::where('username', $user)->firstOrFail();
        }

        // Ambil berita atau data terkait pengguna
        $news = $user->news;

        // Kirim data ke view
        return view('User.show', [
            'user' => $user,
            'news' => $news,
            'showEditProfile' => $this->showEditProfile,
            'isFollowing' => $this->isFollowing,
        ]);
    }

    public function edit($user)
    {

    }
}
