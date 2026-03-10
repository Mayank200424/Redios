<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SubCategoryRequest;


class SubCategoryController extends Controller
{

    public function index()
    {
        $subcategories = Category::with('parent')->whereNotNull('parent_id')->latest()->paginate(5);
        return view('admin.subcategory-list', compact('subcategories'));
    }

    public function subcategory()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.subcategory-add', compact('categories'));
    }

    public function create(SubCategoryRequest $request)
    {
        $data = $request->validated(); 

        $subcategory = new Category();
        $subcategory->parent_id = $data['category_name'];
        $subcategory->name = $data['name'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $fileName, 'public');
            $subcategory->image = $path;
        }

        if ($subcategory->save()) {
            return redirect()->route('admin.subcategory')->with('success', 'SubCategory Created SuccessFully');
        } else {
            return redirect()->back()->with('error', 'SubCategory Created Failed');
        }
    }

    public function edit($id)
    {
        $subcategory = Category::findOrFail($id);
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.subcategory-edit', compact('subcategory', 'categories'));
    }

    public function update(SubCategoryRequest $request, $id)
    {
        $subcategory = Category::findOrFail($id);

        $data = $request->validated(); 

        $subcategory->parent_id = $data['category_name'];
        $subcategory->name = $data['name'];

        if ($request->hasFile('image')) {

            if ($subcategory->image && Storage::disk('public')->exists($subcategory->image)) {
                Storage::disk('public')->delete($subcategory->image);
            }

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();

            $path = $file->storeAs('uploads', $fileName, 'public');

            $subcategory->image = $path;
        }

        if ($subcategory->save()) {
            return redirect()->route('admin.subcategory')->with('success', 'SubCategory Updated SuccessFully');
        } else {
            return redirect()->back()->with('error', 'SubCategory Updated Failed');
        }
    }
    
    public function delete($id)
    {
        $subcategory = Category::findOrFail($id);

        if ($subcategory->delete()) {
            return redirect()->route('admin.subcategory')->with('success', 'SubCategory Deleted SuccessFully');
        } else {
            return redirect()->back()->with('error', 'SubCategory Deleted Failed');
        }
    }

    public function search(Request $request)
    {
        $subcategory = Category::with('parent')->whereNotNull('parent_id')->where('name', 'like', "%$request->search%")->paginate(5);
        return response()->json($subcategory);
    }
}
