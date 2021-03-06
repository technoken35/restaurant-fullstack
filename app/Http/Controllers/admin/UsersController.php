<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        // built in pagination by laravel. we will only see one user per page
        $users= User::paginate(10);
        return view('admin/users/all', [
            'users'=>$users
        ]);
    }

    public function create(){
        // Find the model of role this and return an array of objects of the entire role DB table
        // we are then returning a view and array of objects to access in our view
        $roles= Role::All();
        return view('admin/users/create',[
            'roles'=> $roles
        ]);
    }

    // our post request in the form goes to this route
    public function store(){
        // create a new user based on our user model
       // return request()->all();

       request()->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required'],

        ]);
        $user = new User();
        $user->fname=request('fname');
        $user->lname=request('lname');
        $user->email=request('email');
        $user->password=Hash::make(request('password'));
        // saving user to DB with built in save function
        $user->save();
        // calling our roles function in User Class which defines a one to many relationship and attatching the request var
        // this will automatically attach role id
        $user->roles()->attach(request('role_id'));



        /*
        This is essentially the same thing as above just different syntax
        User::create([
            'fname' => request('fname'),
            'lname' => request('lname'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);*/
        return redirect('/admin/users');
    }

    // we are accessing the id in the URL /admin/users/1/edit
    public function edit($id){

        $user= User::find($id);
        $roles= Role::All();
        return view('admin/users/edit',[
            'user'=>$user,
            'roles'=>$roles
        ]);
    }

    public function update($id){
        request()->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required'],

        ]);


        // finding the user by ID and updating, Then saving to DB
        $user = User::find($id);

        $user->fname=request('fname');
        $user->lname=request('lname');
        $user->email=request('email');
        $user->password=Hash::make(request('password'));
        // saving user to DB with built in save function
        $user->save();
        // sync will drop all relationships that user has
        $user->roles()->sync([request('role_id')]);
        // this will update the role WITHOUT dropping other relationships
        //$user->roles()->syncWithoutDetaching([request('role_id')]);
        return redirect('/admin/users');
    }

    public function delete($id){
        $user= User::find($id);
        $user->delete();
        return redirect('/admin/users');
    }
}
