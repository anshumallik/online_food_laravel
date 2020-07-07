<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = Category::where('category_id', null)->get();
        return view('admin.category.index', compact('categories'))->with('id');
    }


    public function create()
    {
        return view('admin.category.create');

    }
    public function createsub_subcat(){

        $categories = Category::all();
        return view('admin.sub_subcategory.create',compact('categories'));
    }

    public function createSubcat()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description'=> 'required',
            'image' => 'required|mimes:jpeg,png,jpg|max:10000'
        ]);
        $image = $request->file('image');
        if (isset($image)) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('images/category')) {
                mkdir('images/category', 0777, true);
            }
            $image->move('images/category', $imageName);
        }

        $category = new Category();
        $category->category_id = $request->category_id;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $imageName;
        $category->save();
        $notification = array(
            'message' => 'Category created Successfully',
            'alert-type' => "success"
        );
        return redirect()->route('categories.index')
            ->with($notification);


    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg|max:10000'
        ]);
        $category = Category::find($id);
        $image = $request->file('image');
        if (isset($image)) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('images/category')) {
                mkdir('images/category', 0777, true);
            }
            unlink('images/category/' . $category->image);
            $image->move('images/category', $imageName);
        }
        $category->category_id = $request->category_id;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $imageName;
        $category->save();
        $notification = array(
            'message' => 'Category updated Successfully',
            'alert-type' => "success"
        );
        return redirect()->route('categories.index')
            ->with($notification);



    }


    public function destroy(Category $category)
    {
        if (file_exists('images/category/' . $category->image)) {
            unlink('images/category/' . $category->image);
        }
        $category->delete();
        $notification = array(
            'message' => 'Category deleted Successfully',
            'alert-type' => "success"
        );
        return redirect()->route('categories.index')
            ->with($notification);


    }
}
