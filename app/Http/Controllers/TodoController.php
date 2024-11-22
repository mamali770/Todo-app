<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::paginate(1);
        return view('todos.index', compact('todos'));
    }

    public function show(Todo $id) {
        return view('todos.show', compact('id'));
    }

    public function complete(Todo $id) {
        $id->update([
            'status' => 1
        ]);

        return redirect()->route('todo');
    }

    public function edit(Todo $id) {
        $categories = Category::all();
        return view('todos.edit', compact('id', 'categories'));
    }

    public function update(Request $request , Todo $id) {
        $request->validate([
            'image' => 'image|max:2000',
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'categories' => 'required|integer'
        ]);

        if ($request->image) {
            
            $imageName = time() . '-' . $request->image->getClientOriginalName();
            $request->image->storeAs('images/', $imageName);

            $id->update([
                'image' => $imageName,
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->categories
            ]);
        } else {
            $id->update([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->categories
            ]);
        }

        return redirect()->route('todo');
    }

    public function destroy(Todo $id) {
        $id->delete();
        return redirect()->route('todo');
    }

    public function create() {
        $categories = Category::all();
        return view('todos.create', compact('categories'));
    }

    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'image' => 'required|max:2000|image',
            'title' => 'required|min:5',
            'category_id' => 'required|integer',
            'description' => 'required|min:5'
        ]);

        $imageName = time() . '-' . $request->image->getClientOriginalName();
        $request->image->storeAs('/images', $imageName);

        Todo::create([
            'image' => $imageName,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description
        ]);

        return redirect()->route('todo');
    }
}
