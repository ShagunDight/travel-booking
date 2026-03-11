<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10); 
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([ 
            'name' => 'required|string|max:255|unique:categories,name', 
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'places' => 'nullable|string|max:255',
        ]);

        $imagePath = null;

        if ($request->hasFile('image_url')) {
            $imageName = time().'_'.$request->file('image_url')->getClientOriginalName();
            $request->file('image_url')->move(public_path('images/category'), $imageName);
            $imagePath = '/images/category/'.$imageName;
        }

        $category = Category::create([
            "name" => $data['name'],
            "image_url" => $imagePath,
            "places" => $data['places']
        ]);

        if ($imagePath) {
            Image::create([
                'type'    => 5,
                'type_id' => $category->id,
                'url'     => $imagePath,
                'alt'     => $category->name,
                'sort'    => 0,
            ]);
        }

        return redirect()->route('admin.categories.index')->with('success','Category created successfully');
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
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([ 
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id, 
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'places' => 'nullable|string|max:255',
        ]);

        $imagePath = $category->image_url;

        if ($request->hasFile('image_url')) {
            if ($category->image_url && file_exists(public_path($category->image_url))) {
                unlink(public_path($category->image_url));
            }

            $imageName = time().'_'.$request->file('image_url')->getClientOriginalName();
            $request->file('image_url')->move(public_path('images/category'), $imageName);
            $imagePath = '/images/category/'.$imageName;

            Image::updateOrCreate(
                ['type' => 5, 'type_id' => $category->id],
                [
                    'url'  => $imagePath,
                    'alt'  => $data['name'],
                    'sort' => 0,
                ]
            );
        }

        $category->update([
            "name" => $data['name'],
            "image_url" => $imagePath,
            "places" => $data['places']
        ]);

        return redirect()->route('admin.categories.index')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete(); 
        return redirect()->route('admin.categories.index')->with('success','Category deleted successfully');
    }
}
