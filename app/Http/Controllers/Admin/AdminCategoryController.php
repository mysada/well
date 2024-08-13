<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Category List';
        $categories = Category::all();
        return view('admin.pages.category.index', compact('categories','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add New Category';
        return view('admin.pages.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Store the uploaded image in a specific directory
            $imagePath = $request->file('image')->store('images/home', 'public');

            // Create the new category
            Category::create([
                'name' => $request->name,
                'image' => $imagePath,  // Save the path to the image
            ]);

            // Redirect to the category list with a success message
            return redirect()->route('AdminCategoryList')->with('success', 'Category created successfully.');
        } else {

            return redirect()->back()->withErrors(['image' => 'Image upload failed.']);
        }
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
        // Fetch the category by ID
        $category = Category::findOrFail($id);

        // Return the edit view with the category data
        return view('admin.pages.category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Fetch the category
        $category = Category::findOrFail($id);

        // Update the name
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($category->image_path) {
                Storage::delete('public/' . $category->image);
            }

            // Save the new image and update the image path
            $category->image_path = $request->file('image')->store('images/admin', 'public');
        }

        $category->save();

        // Redirect to the category list with a success message
        return redirect()->route('AdminCategoryList')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find ID
        $category = Category::findOrFail($id);

        $category->delete();

        // Redirect to the category list with a success message
        return redirect()->route('AdminCategoryList')->with('success', 'Category deleted successfully.');

    }
}
