<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('todos')->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        ]);

        Category::create([
            'title' => $request->title,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $category->update([
            'title' => $request->title,
        ]);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('danger', 'Category deleted.');
    }
}

