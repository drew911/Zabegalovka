<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reservations;
use Auth;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('ReservationThanks');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createReservations');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $request->validate([
          'name' => 'required|max:255',
          'phone' => 'required|numeric',
          'date' => 'required|date|after:today',
          'time' => 'required|date_format:H:i',
          'duration' => 'required|numeric',
          'guests' => 'required|numeric'
      ]);

      if (Auth::user()){
        $userId = Auth::user()->id;
      }else{
        $userId = NULL;
      }

      $name = $request['name'];
      $phone = $request['phone'];
      $date = $request['date'];
      $time = $request['time'];
      $duration = $request['duration'];
      $guests = $request['guests'];

      $post = [
            'name' => $name,
            'user_id' => $userId,
            'phone' => $phone,
            'date' => $date,
            'time' => $time,
            'duration' => $duration,
            'guests' => $guests
        ];

        Reservations::create($post);


        if (Auth::user()){
          return redirect()->route('reservations');
        }else{
          return redirect()->route('ReservationThanks');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

      $token = csrf_token();
      // dd($token);
      if (Auth::user()){
        $userId = Auth::user()->id;
        $reservations = Reservations::WHERE ('user_id', $userId)->orderBy('date', 'asc')->get();
        return view('reservations', [
          'reservations' => $reservations
        ]);

      }else{
        return view('createReservations');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $reservations=Reservations::findOrFail($id);
      // $reservations->save();
      return view('editReservations', [
          'reservations' => $reservations
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $reservation=Reservations::findOrFail($id);
          $request->validate([
              'name' => 'required|max:255',
              'phone' => 'required|numeric',
              'date' => 'required|date|after:created_at',
              'time' => 'required|date_format:H:i',
              'duration' => 'required|numeric',
              'guests' => 'required|numeric'
          ]);

          $name = $request['name'];
          $phone = $request['phone'];
          $date = $request['date'];
          $time = $request['time'];
          $duration = $request['duration'];
          $guests = $request['guests'];

          $post = [
                'name' => $name,
                'phone' => $phone,
                'date' => $date,
                'time' => $time,
                'duration' => $duration,
                'guests' => $guests
            ];

          $reservation->update($post);
          return redirect()->route('reservations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $reservations=Reservations::findOrFail($id);
      $reservations->delete();
      return redirect()->route('manageReservations');
    }
}
