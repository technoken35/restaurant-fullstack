<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodCategory;
use Illuminate\Support\Facades\Validator;


class FoodCategoriesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        // built in pagination by laravel. we will only see one FoodCategory per page
        $categories= FoodCategory::paginate(10);
        return view('admin/food-categories/all', [
            'categories'=>$categories
        ]);
    }

    public function create(){

       // $categories= FoodCategory::All();
        return view('admin/food-categories/create');
    }

    // our post request in the form goes to this route
    public function store(){

       request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image_url' => ['required', 'string'],
        ]);

        $category = new FoodCategory();
        $category->title=request('title');
        $category->description=request('description');
        $category->image_url=request('image_url');
        // saving FoodCategory to DB with built in save function
        $category->save();

        return redirect('/admin/food-categories');
    }

    // we are accessing the id in the URL /admin/food-categories/1/edit
    public function edit($id){

        $category= FoodCategory::find($id);
        return view('admin/food-categories/edit',[
            'category'=>$category,
        ]);
    }

    public function update($id){
        request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image_url' => ['required', 'string'],
        ]);


        // finding the FoodCategory by ID and updating, Then saving to DB
        $category = FoodCategory::find($id);

        $category->title=request('title');
        $category->description=request('description');
        $category->image_url=request('image_url');
        // saving FoodCategory to DB with built in save function
        $category->save();
        return redirect('/admin/food-categories');

    }

    public function delete($id){
        $category= FoodCategory::find($id);
        $category->delete();
        return redirect('/admin/food-categories');
    }

}
