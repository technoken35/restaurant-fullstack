@extends('layouts.app')

@section('content')
    <div id="waitlist-page">
        <div class="content-box">
            <div class="row">
                <div class="col-md-6">

                    <h1> Get On The List</h1>
                    <form>
                        <div class="form-group">
                            <div class="firstNameInput">
                                <label for="firstNameInput" >First Name</label>
                                <input name="fname" type="text" class="form-control" id="firstNameInput" placeholder="John">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="lastNameInput">
                                <label for="lastNameInput" >Last Name</label>
                                <input name="lname" type="text" class="form-control" id="lastNameInput" placeholder="Doe">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="emailInput" >Email address</label>
                          <input name="email" type="email" class="form-control" id="emailInput" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="phoneInput" >Phone #</label>
                            <input name="phone" type="text" class="form-control" id="phoneInput" placeholder="702-421-5634">
                        </div>
                        <div class="form-group">
                          <label for="guestsInput" >How Many Guests</label>
                          <select name="guests" class="form-control" id="guestsInput">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="timeInput" id="time">What Time?</label>
                            <select name="time" class="form-control" id="timeInput">
                              <option value="6">6:00PM</option>
                              <option value="7">7:00PM</option>
                              <option value="8">8:00PM</option>
                              <option value="9">9:00PM</option>
                              <option value="10">10:00PM</option>
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit">Confirm</button>
                      </form>
                </div>
                <div class="col-md-6">
                    <p>
                        Please Note: This is not a reservation. You will be added to the current wait list.
                        You may have a short wait once you arrive while we prepare your table.
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection
