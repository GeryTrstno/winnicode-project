<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\SubCategory;
use App\Models\CategoryNews;
use App\Models\SubCategoryNews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();

        // dd($categories, $subcategories, $page);
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
        // dd($request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'caption' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'categories' => 'array|max:3',
            'categories.*' => 'exists:categories,id',
            'subcategories' => 'array|max:6',
            'subcategories.*' => 'exists:subcategories,id',
        ]);


        $news = new News();
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->caption = $request->input('caption');
        $news->image = $request->file('image') ? $request->file('image')->store('images/news', 'public') : null;
        $news->slug = Str::slug($request->input('title'), '-');
        $news->user_id = Auth::id();
        $news->status = 'pending';

        $news->save();

        foreach ($request->input('categories', []) as $categoryId) {
            $categoryNew = new CategoryNews();
            $categoryNew->news_id = $news->id;
            $categoryNew->category_id = $categoryId;
            $categoryNew->save();
        }

        foreach ($request->input('subcategories', []) as $subcategoryId) {
            $subcategoryNew = new SubCategoryNews();
            $subcategoryNew->news_id = $news->id;
            $subcategoryNew->subcategory_id = $subcategoryId;
            $subcategoryNew->save();
        }

        return redirect()->route('user.show', auth()->user()->username ?? 'user' . auth()->user()->id)
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
