<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Reservation;


use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        // built in pagination by laravel. we will only see one Reservation per page
        $reservations= Reservation::paginate(10);
        return view('admin/reservations/all', [
            'reservations'=>$reservations
        ]);
    }

    public function create(){

       // $reservations= Reservation::All();
        return view('admin/reservations/create');
    }

    // our post request in the form goes to this route
    public function store(){

       request()->validate([
        'fname' => ['required', 'string'],
        'lname' => ['required', 'string'],
        'email' => ['required', 'string'],
        'phone_number' => ['required', 'string'],
        'guests_total' => ['required', 'integer'],
        'time' => ['required', 'string'],

        ]);
        $reservation= new Reservation();
        $reservation->fname=request('fname');
        $reservation->lname=request('lname');
        $reservation->email=request('email');
        $reservation->phone_number=request('phone_number');
        $reservation->guests_total=request('guests_total');
        $reservation->time=request('time');
        // saving Reservation to DB with built in save function
        $reservation->save();

        return redirect('/admin/reservations');
    }

    // we are accessing the id in the URL /admin/reservations/1/edit
    public function edit($id){

        $reservation= Reservation::find($id);
        return view('admin/reservations/edit',[
            'reservation'=>$reservation,
        ]);
    }

    public function update($id){
        request()->validate([
            'fname' => ['required', 'string'],
            'lname' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'guests_total' => ['required', 'integer'],
            'time' => ['required', 'string'],

        ]);


        // finding the Reservation by ID and updating, Then saving to DB
        $reservation = Reservation::find($id);

        $reservation->fname=request('fname');
        $reservation->lname=request('lname');
        $reservation->email=request('email');
        $reservation->phone_number=request('phone_number');
        $reservation->guests_total=request('guests_total');
        $reservation->time=request('time');
        // saving Reservation to DB with built in save function
        $reservation->save();
        return redirect('/admin/reservations');

    }

    public function delete($id){
        $reservation= Reservation::find($id);
        $reservation->delete();
        return redirect('/admin/reservations');
    }

}
