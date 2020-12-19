<?php

namespace App\Http\Controllers;

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
	 * @return View
	 */
	public function index(): View {
		return view("student.index", ["students" => Student::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create(): View {
		return \view("student.create", ["promo_list" => Promo::all()]);
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
		return \view("student.edit", ["editing_student" => $student, "promo_list" => Promo::all()]);
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
