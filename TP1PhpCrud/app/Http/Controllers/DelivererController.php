<?php

namespace App\Http\Controllers;

use App\Deliverer;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DelivererController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @param Restaurant $restaurant
     * @return View
     */
    public function index(Request $request) {
        return view(
            "deliverer.index",
            [
                "current_restaurant" => Restaurant::find($request->get("restaurant")),
                "deliverers"=>Deliverer::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Deliverer $deliverer
     * @return \Illuminate\Http\Response
     */
    public function show(Deliverer $deliverer) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Deliverer $deliverer
     * @return \Illuminate\Http\Response
     */
    public function edit(Deliverer $deliverer) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Deliverer $deliverer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deliverer $deliverer) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Deliverer $deliverer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deliverer $deliverer) {
        //
    }
}
