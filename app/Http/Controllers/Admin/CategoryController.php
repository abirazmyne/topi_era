<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class CategoryController extends Controller
{
    public function category()
    {
        return view('admin.product.category');
    }

    public function addCategory(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Generate a slug from the category name and append a random number
        $nameSlug = Str::slug($validatedData['name']);
        $randomNumber = rand(1, 999);
        $slug = $nameSlug . '-' . $randomNumber;


        // Handle the image upload
        $imagePath = null;
        if ($request->hasFile('category_logo')) {
            $image = $request->file('category_logo');
            $imageName = time() . '.'.'CAT'. $image->getClientOriginalExtension();
            $imagePath = 'categories/' . $imageName;

            // Store the image in the 'public/storage/categories' directory
            $image->storeAs('public/categories', $imageName);
        }

        // Create a new category
        $category = new Category();
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'] ?? null;
        $category->category_logo = $imagePath;
        $category->slug = $slug;
        $category->status = $validatedData['status'] ?? true; // Default to active if not provided
        $category->created_by = Auth::id(); // Assuming user authentication is set up
        $category->save();

        return response()->json(['message' => 'Category added successfully.']);
    }

    public function getCategoriesData(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::select(['id', 'name', 'description', 'status', 'image_path']);

            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    return $row->image_path ? '<img src="' . asset('storage/' . $row->image_path) . '" width="50" />' : 'No Image';
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('categories.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" data-id="' . $row->id . '" class="btn btn-danger btn-sm delete-btn">Delete</a>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
    }

    // app/Http/Controllers/CategoryController.php
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully.']);
    }


}
