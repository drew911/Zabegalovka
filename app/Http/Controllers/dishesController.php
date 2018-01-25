<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dishes;
use App\User;

use Illuminate\Support\Facades\Storage;

class dishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dishes = Dishes::all();

      return view('dishes', [
          'dishes' => $dishes
      ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createDishes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // dd($request->file('image'));
      $request->validate([
          'name' => 'required|max:255|unique:dishes',
          'description' => 'required',
          'price' => 'required|numeric',
          'image' => 'required|mimes:jpeg,bmp,png,jpg|max:6000'
      ]);


//-------------------------------
  //   $imagePath = $request->file('image')->store('public');
  //
  //  $image = Image::make(Storage::get($imagePath))->resize(320,240)->encode();
  //  Storage::put($imagePath,$image);
   //
  //  $imagePath = explode('/',$imagePath);
   //
  //  $imagePath = $imagePath[1];
  //
  //  $myTheory->image = $imagePath;
   //
  //  }
   //
  //  $myTheory->save();
//------------------------


      $path = $request->file('image')->storePublicly('public/photos'); // issaugo faila i storage
// cia turime pakeisti path pries perduodant i post'A
// turime: public/photos/gX0R5ku4C4lloQKpF6JX9EnyqUJVIBXqhQCc7CYr.jpeg
// reikia gauti: storage/photos/gX0R5ku4C4lloQKpF6JX9EnyqUJVIBXqhQCc7CYr.jpeg
      $path = explode('/', $path);
      $path[0]='storage';
      $path = implode('/',$path);
  // gavome nauja $path
      $name = $request['name'];
      $description = $request['description'];
      $price = $request['price'];


        $post = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'image' => $path
        ];

        Dishes::create($post);
        return redirect()->route('dishes');
    }







    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $dish = Dishes::findOrFail($id);
      return view('dishes', [
          'dish' => $dish
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

    /**->validate([
            'upload' => 'required|mimes:jpeg,bmp,png|max:6000'
        ]);
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
