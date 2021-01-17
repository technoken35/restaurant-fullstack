<?php

namespace App\Http\Controllers;
use App\Models\Member;


use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function index (){
        return view('home');
    }

    public function about(){
        return view('pages/about');
    }

    public function reservations(){
        return view('pages/reservations');
    }

    public function contact(){
        return view('pages/contact');
    }

    public function offers(){
        return view('pages/offers');
    }

    public function registerMember(){
        request()->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone_number' => ['required', 'string'],

        ]);

        $member = new Member();
        $member->fname=request('fname');
        $member->lname=request('lname');
        $member->email=request('email');
        $member->phone_number=request('phone_number');

        // saving Member to DB with built in save function
        $member->save();

        return redirect('/offers/thank-you');
    }

    public function menu (){
        return view('menu/index');
    }

    public function offersThankYou(){
        return view ('pages/thank-you');
    }

    public function singleMenu(){
        return view('menu/single-menu');
    }
}
