<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:5'
        ] ,
        [
            'title.required' => 'فیلد عنوان اجباری است',
            'title.min' => 'فیلد عنوان باید دست کم شامل پنج کاراکتر باشد.'
        ]);

        Category::create([
            'title' => $request->title
        ]);

        return redirect()->route('category.index');
    }

    public function edit(Category $id) {
        return view('categories.update', ['id' => $id]);
    }

    public function update(Request $request , Category $id) {
        
        $request->validate([
            'title' => 'required|min:5'
        ] ,
        [
            'title.required' => 'فیلد عنوان اجباری است',
            'title.min' => 'فیلد عنوان باید دست کم شامل پنج کاراکتر باشد.'
        ]);

        $id->update([
            'title' => $request->title
        ]);
        return redirect()->route('category.index');
    }

    public function destroy(Request $request , Category $id) {
        // dd($request->all() , $id);
        $id->delete();
        return redirect()->route('category.index');
    }
}
