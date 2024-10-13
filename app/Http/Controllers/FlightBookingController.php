<?php

namespace App\Http\Controllers;

use App\Models\FlightBooking;
use App\Models\FlightDays;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FlightBookingController extends Controller
{
   
    public function index()
    {
       
        $bookings = FlightBooking::all();
      
        $flightDays = FlightDays::where('status', 'a')->get();
        return Inertia::render('Bookings/Index', [
            'bookings' => $bookings,
            'flightDays' => $flightDays,
        ]);
    }

    
    public function create()
    {
        $flightDays = FlightDays::where('status', 'a')->get(); 
        return Inertia::render('Bookings/Create', [
            'flightDays' => $flightDays,
        ]);
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'flight_name' => 'required',
            'take_of_location' => 'required',
            'landing_loaction' => 'required',
            'take_of_time' => 'required',
            'landing_time' => 'required',
            'landing_date' => 'required',
            'booking_day' => 'required',
        ]);

        FlightBooking::create([
            'flight_name' => $request->flight_name,
            'take_of_location' => $request->take_of_location,
            'landing_loaction' => $request->landing_loaction,
            'take_of_time' => $request->take_of_time,
            'landing_time' => $request->landing_time,
            'landing_date' => $request->landing_date,
            'booking_day' => $request->booking_day,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }

    
    public function edit($id)
    {
        $booking = FlightBooking::findOrFail($id);
        $flightDays = FlightDays::where('status', 'a')->get();

        return Inertia::render('Bookings/Edit', [
            'booking' => $booking,
            'flightDays' => $flightDays,
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $booking = FlightBooking::findOrFail($id);

        $request->validate([
            'flight_name' => 'required',
            'take_of_location' => 'required',
            'landing_loaction' => 'required',
            'take_of_time' => 'required',
            'landing_time' => 'required',
            'landing_date' => 'required',
            'booking_day' => 'required',
        ]);

        $booking->update([
            'flight_name' => $request->flight_name,
            'take_of_location' => $request->take_of_location,
            'landing_loaction' => $request->landing_loaction,
            'take_of_time' => $request->take_of_time,
            'landing_time' => $request->landing_time,
            'landing_date' => $request->landing_date,
            'booking_day' => $request->booking_day,
            'updated_by' => auth()->id(),
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully!');
    }

    
    public function destroy($id)
    {
        $booking = FlightBooking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully!');
    }
    public function userBookingDetails()
    {
        $bookings = FlightBooking::all();
        

        return Inertia::render('Bookings/UserBookingList', [
            'bookings' => $bookings,
            
        ]);
    }
}
