<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
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
        $categories = Category::all();
        $subcategories = SubCategory::all();

        return view('News.create', [
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
       public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('home')->with('error', 'You must be logged in to create news.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['slug'] = Str::slug($validated['title'], '-');

        News::create($validated);

        return redirect()->route('home')
            ->with('success', 'News created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $categories = Category::all();

        return view('News.show', [
            'news' => $news,
            'categories' => $categories,
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
