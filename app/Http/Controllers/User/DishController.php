<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
Use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\User;

class DishController extends Controller
{
    protected $validationRules = [
        'name'             => 'required|unique:houses|min:5|max:100',
        'description'             => 'nullable|url|max:250',
        'ingredients'          => 'max:250',
        'allergies'              => 'required|max:50',
        'price'           => 'max:150',
        'area'              => 'numeric|min:50|max:5000',
        'number_rooms'      => 'numeric|min:0|max:100',
        'is_rent'           => 'numeric|min:0|max:1',
        'price'             => 'numeric',
        'available_date'    => 'date'
    ];
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        $dishes = Dish::where('user_id', $user->id)->get();

        $data = [
            'user'      => $user,
            'dishes'    => $dishes,
        ];

        return view('user.dishes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newDishData = $request->all();

        Dish::create($newDishData);

        return redirect()->route('user.dishes.show', $newDishData['id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        $user = User::where('id', Auth::user()->id)->first();

        $dishes = Dish::where('user_id', $user->id)->get();

        return view('user.dishes.show', compact('dishes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('user.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return redirect()->route('user.dishes.index')->with('status', "Il piatto $dish->name è stato eliminato");
    }
}