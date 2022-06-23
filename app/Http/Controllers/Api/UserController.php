<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Category;
use App\Dish;


use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    use \App\Traits\searchFilters;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $attributes = $request->all();

        $jointable = DB::table('users')->join('category_user','category_user.user_id','=','users.id');

        $users = User::all();
        $categories = Category::all();
        $dishes = Dish::all();

        $array = [];

        foreach ($users as $user) {
            $categoriesArray =[];
            foreach ($user->categories as $cat) {
                $catName = $categories->where('id', $cat->id)->first();
                $categoriesArray[] = $catName->name;
            }
            $array[] = [
                'user_id' => $user->id,
                'categories' => $categoriesArray
            ];
        };

        // dd($array);


        if (array_key_exists('home', $attributes)) {
            return response()->json([
                'success'   => true,
                'response'  => [
                    'data'      => $users,
                    'array'     => $array,
                    'dishes'    => $dishes
                ]
            ]);
        }

        if (array_key_exists('category', $attributes)) {
            return response()->json([
                'success'   => true,
                'response'  => [
                    'data'      => $jointable->where('category_id', $request->category)->get(),
                    'array'     => $array,
                    'dishes'    => $dishes
                ]
            ]);
        }

        //TODO Slegare il RETURN dagli IF
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = User::where('slug', $slug)->first(); 
        $dishes = Dish::where('user_id', $user->id)->get();

        // dd($user);
        
       return response()->json([
            'success'   => true,
            'response'  => [
                'user'      => $user,
                'dishes'    => $dishes
            ]
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