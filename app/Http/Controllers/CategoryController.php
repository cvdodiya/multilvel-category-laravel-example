<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createCategory(Request $request)
    {
        $categories = Category::where('parent_id', 0)->orderby('category_title', 'asc')->get();
        if($request->method()=='GET')
        {
            return view('category.create', compact('categories'));
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'category_title'      => 'required',
                'slug'      => 'required|unique:categories',
                'parent_id' => 'nullable|numeric'
            ]);

            Category::create([
                'category_title' => $request->category_title,
                'slug' => $request->slug,
                'parent_id' =>$request->parent_id
            ]);

            return redirect()->back()->with('success', 'Category has been created successfully.');
        }
    }

    public function allCategories()
	{
    	$categories = Category::where('parent_id', 0)->orderby('category_title', 'asc')->get();

    	return view('category.all_category', compact('categories'));
	}


    public function editCategory($id, Request $request)
    {
        $category = Category::findOrFail($id);
        if($request->method()=='GET')
        {
            $categories = Category::where('parent_id', 0)->where('id', '!=', $category->id)->orderby('category_title', 'asc')->get();
            return view('category.edit_category', compact('category', 'categories'));
        }

        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'category_title'     => 'required',
                'slug' => ['required', Rule::unique('categories')->ignore($category->id)],
                'parent_id'=> 'nullable|numeric'
            ]);
            if($request->category_title != $category->category_title || $request->parent_id != $category->parent_id)
            {
                if(isset($request->parent_id))
                {
                    $checkDuplicate = Category::where('category_title', $request->category_title)->where('parent_id', $request->parent_id)->first();
                    if($checkDuplicate)
                    {
                        return redirect()->back()->with('error', 'Category already exist in this parent.');
                    }
                }
                else
                {
                    $checkDuplicate = Category::where('category_title', $request->category_title)->where('parent_id', null)->first();
                    if($checkDuplicate)
                    {
                        return redirect()->back()->with('error', 'Category already exist with this name.');
                    }
                }
            }

            $category->category_title = $request->category_title;
            $category->parent_id = $request->parent_id;
            $category->slug = $request->slug;
            
            if($category->parent_id == NULL){
                $category->parent_id = 0;
            }
            $category->save();
            return redirect()->back()->with('success', 'Category has been updated successfully.');
        }
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        if(count($category->subcategory))
        {
            $subcategories = $category->subcategory;
            foreach($subcategories as $cat)
            {
                $cat = Category::findOrFail($cat->id);
                $cat->parent_id = 0;
                $cat->save();
            }
        }
        $category->delete();
        return redirect()->back()->with('delete', 'Category has been deleted successfully.');
    }

    public function treeview(){
        return view('category.treeview');    
    }
}