<?php

namespace App\Http\Controllers;

use App\Ingredients;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("ingredients.index", ["ingredients" => Ingredients::all()]);
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
     */
    public function show(Ingredients $ingredient)
    {
        return view("ingredients.show", ["ingredient" => $ingredient]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredients $ingredient)
    {
        return view("ingredients.edit", ["ingredient" => $ingredient]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Ingredients $ingredient)
    {
        Ingredients::find($ingredient->id)->update([
            "name" => $request->input("name"),
        ]);

        return redirect()->action([IngredientsController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredients $ingredient)
    {
        Ingredients::find($ingredient->id)->delete();
        return redirect()->action([IngredientsController::class, 'index']);
    }
}
