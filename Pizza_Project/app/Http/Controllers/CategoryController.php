<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // Category List Page
    public function list(){
        $categories = Category::orderBy('category_id', 'desc')->get();
        // dd($categories);
        return view('admin.category.list', compact('categories'));
    }

    // Category Create Page
    public function createPage(){
        return view('admin.category.create');
    }

    // Create Data
    public function create(Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);
        // dd($data);
        Category::create($data);
        return to_route('category#list');
    }

    // Delete Category Name
    public function delete($id){
        $delData = Category::where('category_id', $id)->delete();
        return back();
    }




    // Category Validation Check
    private function categoryValidationCheck($request){
        return Validator::make($request->all(), [
            'categoryName' => 'required|unique:categories,name'
        ])->validate();
    }

    // Request Data
    public function requestCategoryData($request){
        return [
            'name' => $request->categoryName
        ];
    }
}
