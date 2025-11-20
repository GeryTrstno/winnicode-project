<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role != 'admin') {
            return redirect('/')->with('error', 'Not an Admin!');
        }

        $news = News::all();
        $totalUser = User::where('role', 'user')->count();
        $totalPending = News::where('status', 'pending')->count();


        return view('Admin.index', [
            'news' => $news,
            'totalPending' => $totalPending,
            'totalUser' => $totalUser
        ]);
    }

    public function accept(string $id)
    {
        $news = News::findOrFail($id);
        $news->status = 'published';
        $news->save();

        return redirect()->route('admin.dashboard')->with('success', 'News item accepted succesfully.');
    }

    public function reject(string $id)
    {
        $news = News::findorFail($id);
        $news->status = 'rejected';
        $news->save();

        return redirect()->route('admin.dashboard')->with('success', 'News item rejected succesfully.');
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
    public function show(string $id)
    {
        //
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
    public function delete(string $id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('admin.dashboard')->with('success', 'News item deleted successfully.');
    }
}
