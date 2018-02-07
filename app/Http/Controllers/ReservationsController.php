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
          'date' => 'required|date',
          'time' => 'required|time',
          'duration' => 'required|numeric',
          'guests' => 'required|numeric'
      ]);


      $name = $request['name'];
      $description = $request['description'];
      $price = $request['price'];

      $post = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'image' => $path
        ];
        // $post = $request->except('_token');

        Dishes::create($post);
        return redirect()->route('dishes');
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
        // dd($userId);
      }else{
        $userId = NULL;
      }
      $reservations = Reservations::WHERE ('user_id', $userId)->get();
      return view('reservations', [
          'reservations' => $reservations
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
