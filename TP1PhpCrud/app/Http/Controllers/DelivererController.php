<?php

namespace App\Http\Controllers;

use App\Deliverer;
use App\Restaurant;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DelivererController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @param Request $request
	 * @return View
	 */
	public function index(Request $request): View {
		return view(
			"deliverer.index",
			[
				"current_restaurant_id" => $request->get("restaurant"),
				"deliverers" => Deliverer::all()
			]
		);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param Request $request
	 * @return View
	 */
	public function create(Request $request): View {
		return \view(
			"deliverer.create",
			[
				"restaurants" => Restaurant::all(),
				"current_restaurant_id" => $request->input("restaurant_id")
			]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return RedirectResponse
	 */
	public function store(Request $request): RedirectResponse {
		$newDeliverer = new Deliverer();
		$newDeliverer->name = $request->input("name");
		$newDeliverer->vehicle = $request->input("vehicle");
		$newDeliverer->save();

		$newDeliverer->restaurants()->attach($request->input("restaurants"));

		return redirect()->route(
			"deliverer.index",
			[
				"restaurant" => $request->get("restaurant_id"),
			]
		);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Deliverer $deliverer
	 * @return View
	 */
	public function show(Deliverer $deliverer): View {
		return \view("deliverer.show", ["current_deliverer" => $deliverer]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Deliverer $deliverer
	 * @return View
	 */
	public function edit(Deliverer $deliverer): View {
		return \view("deliverer.edit",
			[
				"restaurants" => Restaurant::all(),
				"editing_deliverer" => $deliverer
			]
		);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param Deliverer $deliverer
	 * @return RedirectResponse
	 */
	public function update(Request $request, Deliverer $deliverer): RedirectResponse {
		$deliverer->name = $request->input("name");
		$deliverer->vehicle = $request->input("vehicle");
		$deliverer->restaurants()->detach();
		$deliverer->restaurants()->attach($request->input("restaurants"));
		$deliverer->save();

		return redirect()->route("deliverer.index");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Deliverer $deliverer
	 * @return RedirectResponse
	 * @throws Exception
	 */
	public function destroy(Deliverer $deliverer): RedirectResponse {
		$deliverer->delete();
		return redirect()->route("deliverer.index");
	}
}
