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

      $request->validate([
          'name' => 'required|max:255|unique:dishes',
          'description' => 'required',
          'price' => 'required|numeric',
          'image' => 'required|mimes:jpeg,bmp,png,jpg|max:6000'
      ]);

      $path = $request->file('image')->storePublicly('public/photos'); // issaugo faila i storage

      $path = explode('/', $path);
      $path[0]='storage';
      $path = implode('/',$path);
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
    public function show($id)
    {
      // $dish = Dishes::findOrFail($id);
      // return view('dishes', [
      //     'dish' => $dish
      // ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $dish = Dishes::findOrFail($id);
      return view('editDish', [
          'dish' => $dish
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


      $dish = Dishes::findOrFail($id);

      $request->validate([
          'name' => 'required|max:255',
          'description' => 'required',
          'price' => 'required|numeric',
          'image' => 'mimes:jpeg,bmp,png,jpg|max:6000'
      ]);


      if ($request->file('image')) {

        $path = $request->file('image')->storePublicly('public/photos'); // issaugo faila i storage

        $path = explode('/', $path);
        $path[0]='storage';
        $path = implode('/',$path);


      } else {
        $path = $dish->image;
      }

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

        $dish->update($post);
        return redirect()->route('dishes');
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
        $dish = Dishes::findOrFail($id);

        $path = $dish->image;

          if (file_exists($path)){
            unlink($path);
          }


        $dish->delete();


        //
        //
        // if(file_exists($path)){
        //   unlink($path);
        // }
        // $path->delete();

        return redirect()->route('dishes');


    }


    // protected function validateRequest($request, $id=NULL){
    //   $rules = [
    //     'name' => 'required|max:255',
    //     'description' => 'required',
    //     'price' => 'required|numeric',
    //     'image' => 'required|mimes:jpeg,bmp,png,jpg|max:6000'
    //   ];
    //   if ($id!=NULL) {
    //     $rules['name'].='.name.'.$id.',id';
    //   }
    //   $request->validate($rules);
    // }

}
