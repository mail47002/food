<?php

namespace App\Http\Controllers\Api;

use App\Advert;
use App\Http\Resources\AdvertResource;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertsController extends Controller
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advert = Advert::with(['user', 'product'])->find($id);

        if ($advert) {
            return response()->json([
                'status' => 'success',
                'advert' => $advert
            ]);
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

    /**
     * Return advert orders.
     *
     * @param $id
     * @return AdvertResource
     */
    public function orders($id)
    {
        return new AdvertResource(Order::with('user')
            ->where('advert_id', $id)
            ->where('confirmed', '!=', Order::CONFIRMED)
            ->get());
    }
}
