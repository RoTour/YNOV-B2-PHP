<?php

namespace App\Http\Controllers;

use App\Promo;
use App\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PromoController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function index(): View {
		return view("promo.index", ["promos_list" => Promo::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create(): View {
		return \view("promo.create", ["students_list" => Student::all()]);
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

		Student::whereIn('id', $request->students)->update(['promo_id'=>$promo->id]);

		return redirect()->route("student.index");
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
		return \view("promo.edit", ["editing_promo" => $promo, "students_list" => Student::all()]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param Promo $promo
	 * @return RedirectResponse
	 */
	public function update(Request $request, Promo $promo): RedirectResponse {
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
