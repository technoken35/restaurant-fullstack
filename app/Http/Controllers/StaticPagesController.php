<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Reservation;
use App\Models\GeneralSetting;
use App\Models\SeoSetting;
use App\Models\SocialSetting;





use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function index (){
        $generalSettings= GeneralSetting::find(1);
        $seoSettings = SeoSetting::find(1);
        $socialSettings = SocialSetting::find(1);

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

    public function saveReservation(){
        request()->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'guests_total' => ['required', 'string'],
            'time' => ['required', 'string'],


        ]);

        $reservation = new Reservation();
        $reservation->fname=request('fname');
        $reservation->lname=request('lname');
        $reservation->email=request('email');
        $reservation->phone_number=request('phone_number');
        $reservation->guests_total=request('guests_total');
        $reservation->time=request('time');

        $reservation->save();
        return redirect('/reservation/confirmation');
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

    public function reservationConfirmation (){
        return view('pages/reservation-confirmation');
    }


    public function singleMenu($slug){
        return view('menu/single-menu/',[
            // uc first is built in function to turn first letter to uppercase
            "foodItem"=> ucfirst($slug)
        ]);
    }
}
