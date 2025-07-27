<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
