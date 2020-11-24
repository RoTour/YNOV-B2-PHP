<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact.index', ["contacts" => Contact::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newContact = new Contact();
        $newContact->firstname = $request->input("firstname");
        $newContact->lastname = $request->input("lastname");
        $newContact->email = $request->input("email");
        $newContact->phone = $request->input("phone");
        $newContact->save();
        return redirect()->action([ContactController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit', ["contact" => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        Contact::find($contact->id)->update([
            "firstname" => $request->input("firstname"),
            "lastname" => $request->input("lastname"),
            "email" => $request->input("email"),
            "phone" => $request->input("phone"),
        ]);

        return redirect()->action([ContactController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        Contact::find($contact->id)->delete();
        return redirect()->action([ContactController::class, 'index']);
    }
}
