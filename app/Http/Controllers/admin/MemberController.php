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

    public function delete($id){
        $member= Member::find($id);
        $member->delete();
        return redirect('/admin/members');
    }
}
