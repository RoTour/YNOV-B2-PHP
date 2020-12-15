<?php

namespace App\Http\Controllers;

use App\Address;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get("search");
        if($search){
            $restaurant = Restaurant::where('name', 'like', '%'.$search.'%')
                ->orWhere('city', 'like', '%'.$search.'%')
                ->orWhere('postal', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%')
                ->orWhere('type', 'like', '%'.$search.'%')
                ->orWhere('state', 'like', '%'.$search.'%')
                ->get();
        }else{
            $restaurant = Restaurant::all();
        }
        return view("restaurant.index", ["restaurants" => $restaurant, "search" => $search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("restaurant.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $request->input("name");
        $restaurant->website = $request->input("website");
        $restaurant->description = $request->input("description");
        $restaurant->type = $request->input("type");
        $restaurant->state = $request->input("state");
        $restaurant->save();

        $newAddress = new Address();
        $newAddress->address = $request->input("address");
        $newAddress->city = $request->input("city");
        $newAddress->postal = $request->input("postcode");
        $restaurant->address()->save($newAddress);
        return redirect()->action([RestaurantController::class, 'index']);
    }

    public function storeDeliverers(Request $request){
        $restaurant = Restaurant::find($request->input("restaurant_id"));
        $restaurant->deliverers()->detach();
        $restaurant->deliverers()->attach($request->input("deliverers"));

        return redirect()->route("deliverer.index", ["restaurant" => $restaurant->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return view("restaurant.show", ["resto" => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        return view("restaurant.edit", ["resto" => $restaurant]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $resto = Restaurant::find($restaurant->id);
        $resto->update([
            "name" => $request->input("name"),
            "website" => $request->input("website"),
            "description" => $request->input("description"),
            "type" => $request->input("type"),
            "state" => $request->input("state"),
        ]);
        $resto->address->update([
            "address" => $request->input("address"),
            "city" => $request->input("city"),
            "postal" => $request->input("postcode"),
        ]);

        return redirect()->action([RestaurantController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->address->delete();
        $restaurant->delete();
        return redirect()->action([RestaurantController::class, 'index']);
    }
}
