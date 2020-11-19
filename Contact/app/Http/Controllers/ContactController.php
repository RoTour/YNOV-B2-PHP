<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("contacts/index", ["contacts" => DB::select("select * from contacts")]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("contacts/create");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $query = "INSERT INTO contacts (firstname, lastname, email, phone) values (" .
            "'" . $request->input('firstname')  . "'" . ", " .
            "'" . $request->input('lastname')   . "'" . ", " .
            "'" . $request->input('email')      . "'" . ", " .
            "'" . $request->input('phone')      . "')";
        DB::insert($query);
        return redirect()->action([ContactController::class, 'index']);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view(
            'contacts/show',
            ["contact" => DB::select("select * from contacts where id=" . $id)[0]]
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view(
            "contacts/edit",
            ["contact" => DB::select("select * from contacts where id=" . $id)[0]]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $query =
            "UPDATE contacts SET " .
            "firstname = "  . "'" . $request->input("firstname")   . "'" . ", " .
            "lastname = "   . "'" . $request->input("lastname")    . "'" . ", " .
            "email = "      . "'" . $request->input("email")       . "'" . ", " .
            "phone = "      . "'" . $request->input("phone")       . "'" .
            "WHERE id = "   . $id;
        DB::insert($query);
        return redirect()->action([ContactController::class, 'index']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $query = "DELETE FROM contacts WHERE id=".$id;
        DB::delete($query);
        return redirect()->action([ContactController::class, 'index']);
    }
}
