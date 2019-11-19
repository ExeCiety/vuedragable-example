<?php

namespace App\Http\Controllers;

use App\Food;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $response = array();

        $response['status'] = app('Illuminate\Http\Response')->status();
        $response['message'] = "";
        $response['error'] = true;

        try {

            $delete = Food::truncate();

            foreach ($request->foods as $item) {
                $insert = Food::insert([
                    'name'  => $item['name'],
                ]);
            }

            $response['status'] = 200;
            $response['message'] = "success";
            $response['error'] = false;
            $response['time_request'] = date('Y-m-d H:i:s');
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
        }

        return response(json_encode($response))
            ->withHeaders([
                'Content-Type' => "application/json",
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function list(Request $request)
    {
        $response = array();

        $response['status'] = app('Illuminate\Http\Response')->status();
        $response['message'] = "";
        $response['error'] = true;

        try {

            $foods = Food::all();

            $response['total'] = $foods->count();
            $response['data'] = $foods;
            $response['status'] = 200;
            $response['message'] = "success";
            $response['error'] = false;
            $response['time_request'] = date('Y-m-d H:i:s');
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
        }

        return response(json_encode($response))
            ->withHeaders([
                'Content-Type' => "application/json",
            ]);
    }

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
