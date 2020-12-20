<?php

namespace App\Http\Controllers;

use App\Module;
use App\Promo;
use App\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModuleController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @param Request $request
	 * @return View
	 */
	public function index(Request $request): View {
		$search = $request->get("search");
		if ($search) {
			$modules = Module::where('name', 'like', '%' . $search . '%')->get();
		} else {
			$modules = Module::all();
		}
		return view("module.index", ["modules" => $modules, "search" => $search]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create(): View {
		return view(
			"module.create", ["students_list" => Student::all(), "promos_list" => Promo::all()]
		);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return RedirectResponse
	 */
	public function store(Request $request): RedirectResponse {
		$module = new Module();
		$module->name = $request->name;
		$module->description = $request->description;

		$module->save();
		$module->promos()->attach($request->promos);
		$module->students()->attach($request->students);

		return redirect()->route("module.index");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Module $module
	 * @return View
	 */
	public function show(Module $module): View {
		return \view("module.show", ["module" => $module]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Module $module
	 * @return View
	 */
	public function edit(Module $module): View {
		return \view(
			"module.edit",
			[
				"editing_module" => $module,
				"students_list" => Student::all(),
				"promos_list" => Promo::all()
			]
		);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param Module $module
	 * @return RedirectResponse
	 */
	public function update(Request $request, Module $module): RedirectResponse {
		$module->name = $request->name;
		$module->description = $request->description;
		$module->promos()->detach();
		$module->promos()->attach($request->promos);
		$module->students()->detach();
		$module->students()->attach($request->students);

		$module->save();
		return redirect()->route("module.index");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Module $module
	 * @return RedirectResponse
	 * @throws \Exception
	 */
	public function destroy(Module $module): RedirectResponse {
		$module->promos()->detach();
		$module->students()->detach();
		$module->delete();

		return redirect()->route("module.index");
	}
}
