<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Auth;

use Livewire\Attributes\Validate;

class CommentController extends Controller
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
    public function store(StoreCommentRequest $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'news_id' => 'required|exists:news,id',
            'parent_comment_id' => 'nullable|exists:comments,id'
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = Auth::id();
        $comment->news_id = $request->input('news_id');
        $comment->is_active = 1;
        $comment->parent_comment_id = $request->input('parent_comment_id');

        $comment->save();

        return redirect()->route('news.show', $request->input('news_slug'))
            ->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //`
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
