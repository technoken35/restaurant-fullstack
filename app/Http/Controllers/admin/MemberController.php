<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;


class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allOffersMembers(){
        return view('admin/customers/all-offers-members');
    }

    public function index(){
        // built in pagination by laravel. we will only see one Member per page
        $members= Member::paginate(10);
        return view('admin/members/all', [
            'members'=>$members
        ]);
    }

    public function create(){

       // $members= Member::All();
        return view('admin/food-members/create');
    }

    // our post request in the form goes to this route
    public function store(){

       request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image_url' => ['required', 'string'],
        ]);

        $member = new Member();
        $member->title=request('title');
        $member->description=request('description');
        $member->image_url=request('image_url');
        // saving Member to DB with built in save function
        $member->save();

        return redirect('/admin/food-members');
    }

    // we are accessing the id in the URL /admin/food-members/1/edit
    public function edit($id){

        $member= Member::find($id);
        return view('admin/food-members/edit',[
            'member'=>$member,
        ]);
    }

    public function update($id){
        request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image_url' => ['required', 'string'],
        ]);


        // finding the Member by ID and updating, Then saving to DB
        $member = Member::find($id);

        $member->title=request('title');
        $member->description=request('description');
        $member->image_url=request('image_url');
        // saving Member to DB with built in save function
        $member->save();
        return redirect('/admin/food-members');

    }

    public function delete($id){
        $member= Member::find($id);
        $member->delete();
        return redirect('/admin/food-members');
    }
}
