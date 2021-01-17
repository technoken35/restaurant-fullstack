<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodCategory;
use App\Models\FoodItem;


class FoodItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        // built in pagination by laravel. we will only see one FoodItem per page
        $items= FoodItem::paginate(10);
        return view('admin/food-items/all', [
            'items'=>$items
        ]);
    }

    public function create(){

       $categories= FoodCategory::All();
        return view('admin/food-items/create',[
            'categories'=>$categories
        ]);
    }

    // our post request in the form goes to this route
    public function store(){

       request()->validate([
        'title' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string'],
        'price' => ['required','string'],
        'category_id' => ['required', 'integer'],
        ]);

        $item = new FoodItem();
        $item->title=request('title');
        $item->description=request('description');
        $item->image_url=request('image_url');
        $item->price=request('price');
        $item->category_id= request('category_id');
        // saving FoodItem to DB with built in save function
        $item->save();

        return redirect('/admin/food-items');
    }

    // we are accessing the id in the URL /admin/food-items/1/edit
    public function edit($id){
        $categories= FoodCategory::All();
        $item= FoodItem::find($id);
        return view('admin/food-items/edit',[
            'item'=>$item,
            'categories'=>$categories
        ]);
    }

    public function update($id){
        request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'string'],
            'category_id' => ['required', 'integer'],


        ]);

        // finding the FoodItem by ID and updating, Then saving to DB
        $item = FoodItem::find($id);

        $item->title=request('title');
        $item->description=request('description');
        $item->image_url=request('image_url');
        $item->price=request('price');
        $item->category_id= request('category_id');
        // saving FoodItem to DB with built in save function
        $item->save();

        return redirect('/admin/food-items');

    }

    public function delete($id){
        $item= FoodItem::find($id);
        $item->delete();
        return redirect('/admin/food-items');
    }
}
