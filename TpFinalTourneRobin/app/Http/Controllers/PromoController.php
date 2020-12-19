<?php

namespace App\Http\Controllers;

use App\Module;
use App\Promo;
use App\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PromoController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @param Request $request
	 * @return View
	 */
	public function index(Request $request): View {
		$search = $request->get("search");
		if($search){
			$promos = Promo::where('name', 'like', '%'.$search.'%')
				->orWhere('speciality', 'like', '%'.$search.'%')
				->get();
		} else { $promos = Promo::all(); }

		return view("promo.index", ["promos_list" => $promos, "search" => $search]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create(): View {
		return \view(
			"promo.create",
			[
				"students_list" => Student::all(),
				"modules_list" => Module::all()
			]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return RedirectResponse
	 */
	public function store(Request $request): RedirectResponse {
		$promo = new Promo();
		$promo->name = $request->name;
		$promo->speciality = $request->speciality;
		$promo->save();
		$promo->modules()->attach($request->modules);
		Student::whereIn('id', $request->students)->update(['promo_id'=>$promo->id]);

		return redirect()->route("promo.index");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Promo $promo
	 * @return View
	 */
	public function show(Promo $promo): View {
		return \view("promo.show", ["promo"=>$promo]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Promo $promo
	 * @return View
	 */
	public function edit(Promo $promo): View {
		return view(
			"promo.edit",
			[
				"editing_promo" => $promo,
				"students_list" => Student::all(),
				"modules_list" => Module::all()
			]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param Promo $promo
	 * @return RedirectResponse
	 */
	public function update(Request $request, Promo $promo): RedirectResponse {
		$promo->name = $request->name;
		$promo->speciality = $request->speciality;
		$promo->save();

		$promo->modules()->detach();
		$promo->modules()->attach($request->modules);

		Student::where('promo_id', $promo->id)->update(['promo_id'=>null]);
		Student::whereIn('id', $request->students)->update(['promo_id'=>$promo->id]);

		return redirect()->route("promo.index");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Promo $promo
	 * @return RedirectResponse
	 * @throws \Exception
	 */
	public function destroy(Promo $promo) {
		Student::where('promo_id', $promo->id)->update(['promo_id'=>null]);
		$promo->delete();
		return redirect()->route("promo.index");
	}
}
