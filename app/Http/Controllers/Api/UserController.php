<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Category;


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
        $array = [];
        $users = User::all();
        $categories = Category::all();

        foreach ($users as $user) {
            $categoriesArray =[];
            $category_ids = [];
            foreach ($user->categories as $cat) {
                $catName = $categories->where('id', $cat->id)->first();
                $categoriesArray[] = $catName->name;
                $category_ids[] = $catName->id;
            }
            $array[] = [
                'user_id' => $user->id,
                'categories' => $categoriesArray
            ];

            $user['categoriesArray'] = $categoriesArray;
            $user['category_ids'] = $category_ids;

        };


        if (array_key_exists('home', $attributes)) {
            return response()->json([
                'success'   => true,
                'response'  => [
                    'data'      => $users,
                    'array'  => $array
                ]
            ]);
        }

        if (array_key_exists('category_ids', $attributes)) {
            return response()->json([
                'success'   => true,
                'response'  => [
                    'data'      => $users->whereIn('category_ids', $request->category_ids),
                    'array'     => $array
                ]
            ]);
        }


        if (array_key_exists('category_ids', $attributes)) {
            return response()->json([
                'success'   => true,
                'response'  => [
                    'data'      => $users->where(),
                    'array'     => $array
                ]
            ]);
        }




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
    public function show($id)
    {
        //
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





