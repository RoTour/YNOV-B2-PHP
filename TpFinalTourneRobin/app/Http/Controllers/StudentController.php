<?php

namespace App\Http\Controllers;

use App\Module;
use App\Promo;
use App\Student;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @param Request $request
	 * @return View
	 */
	public function index(Request $request): View {
		$search = $request->get("search");
		if($search){
			$students = Student::where('firstname', 'like', '%'.$search.'%')
				->orWhere('firstname', 'like', '%'.$search.'%')
				->orWhere('email', 'like', '%'.$search.'%')
				->get();
		} else { $students = Student::all(); }

		return view("student.index", ["students" => $students, "search" => $search]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create(): View {
		return \view(
			"student.create",
			[
				"promos_list" => Promo::all(),
				"modules_list" => Module::all()
			]
		);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return RedirectResponse
	 */
	public function store(Request $request): RedirectResponse {
		$student = new Student();
		$student->firstname = $request->firstname;
		$student->lastname = $request->lastname;
		$student->email = $request->email;
		$student->promo_id = $request->promo_id;

		$student->save();
		return redirect()->route("student.index");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Student $student
	 * @return View
	 */
	public function show(Student $student): View {
		return \view("student.show", ["student" => $student]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Student $student
	 * @return View
	 */
	public function edit(Student $student): View {
		return \view(
			"student.edit",
			[
				"editing_student" => $student,
				"promos_list" => Promo::all(),
				"modules_list" => Module::all()
			]
		);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param Student $student
	 * @return RedirectResponse
	 */
	public function update(Request $request, Student $student): RedirectResponse {
		$student->firstname = $request->firstname;
		$student->lastname = $request->lastname;
		$student->email = $request->email;
		$student->promo_id = $request->promo_id;

		$student->save();
		$student->modules()->detach();
		$student->modules()->attach($request->modules);
		return redirect()->route("student.index");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Student $student
	 * @return RedirectResponse
	 * @throws Exception
	 */
	public function destroy(Student $student): RedirectResponse {
		$student->delete();
		return redirect()->route("student.index");
	}
}
