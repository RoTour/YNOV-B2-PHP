<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $query = "INSERT INTO
                    contacts (firstname, lastname, email, phone)
                    values (" .
            "'" . $request->input('firstname') . "'" . ", " .
            "'" . $request->input('lastname') . "'" . ", " .
            "'" . $request->input('email') . "'" . ", " .
            "'" . $request->input('phone') . "')";
        DB::insert($query);
        return redirect()->action([ContactController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "in show method";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * //     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        return view("contacts/index", ["contacts" => DB::select("select * from contacts")]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * //     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "UPDATE ROUTE";
//        $except = $request->except("_token");
//        self::$storage[$id] = $except;
//        return view("contacts/index", ["contacts" => self::$storage]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
