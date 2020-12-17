<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Restaurant;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index() {
    return view("employee.index", ["employees" => Employee::all(), "search" => null]);
  }

  /**
   * Show the form for creating a new resource.
   * @param Request $request
   * @param Restaurant $restaurant
   * @return Application|Factory|View
   */
  public function create(Request $request, Restaurant $restaurant) {
    $restaurant_id = $request->input("restaurant");

    return view(
      "employee.create",
      ["restaurant" => Restaurant::find($restaurant_id)]
    );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return RedirectResponse
   */
  public function store(Request $request): RedirectResponse {
    $newEmployee = new Employee();
    $newEmployee->firstname = $request->input("firstname");
    $newEmployee->lastname = $request->input("lastname");
    $newEmployee->restaurant_id = $request->input("restaurant_id");

    $newEmployee->save();

    return redirect()->route("employee.index");
  }

  /**
   * Display the specified resource.
   *
   * @param Employee $employee
   * @return View
   */
  public function show(Employee $employee): View {
    return view("employee.show", ["employee" => $employee]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param Employee $employee
   * @return View
   */
  public function edit(Employee $employee): View {
    return \view("employee.edit", ["employee" => $employee]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param Employee $employee
   * @return View
   */
  public function update(Request $request, Employee $employee) {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Employee $employee
   * @return \Illuminate\Http\Response
   */
  public function destroy(Employee $employee) {

  }
}
