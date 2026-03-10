<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryRequest;



class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::whereNull('parent_id')->latest()->paginate(4);
        return view('admin.category-list', compact('categories'));
    }

    public function category()
    {
        return view('admin.category-add');
    }

    public function create(CategoryRequest $request)
    {
        $data = $request->validated();    

        $category = new Category();
        $category->name = $data['name'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $fileName, 'public');
            $category->image = $path;
        }

        if ($category->save()) {
            return redirect()->route('admin.category')->with('success', 'Category Created SuccessFully');
        } else {
            return redirect()->back()->with('error', 'Category Created Failed');
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category-edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $data = $request->validated(); 

        $category->name = $data['name'];

        if ($request->hasFile('image')) {

            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();

            $path = $file->storeAs('uploads', $fileName, 'public');

            $category->image = $path;
        }

        if ($category->save()) {
            return redirect()->route('admin.category')->with('success', 'Category Updated SuccessFully');
        } else {
            return redirect()->back()->with('error', 'Category Updated Failed');
        }
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
 
        if ($category->delete()) {
            return redirect()->route('admin.category')->with('success', 'Category Deleted SuccessFully');
        } else {
            return redirect()->back()->with('error', 'Category Deleted Failed');
        }
    }

    public function search(Request $request)
    {
        $category = Category::whereNull('parent_id')->where('name', 'like', "%$request->search%")->paginate(3);
        return response()->json($category);
    }
    
}
