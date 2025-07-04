<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\helper\RequestValidatorHelper;
use App\Models\ManagerContactModel;
use Illuminate\Support\Facades\Validator;

class ManagerContactController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = ManagerContactModel::all();

        return view('managerContacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('managerContacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:6',
            'contact' => 'required|digits:9|unique:manager_contacts,contact' ,
            'email' => 'required|email|unique:manager_contacts,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        ManagerContactModel::create($request->all());

        return redirect()->route('managerContacts.index')
            ->with('success', 'Manager Contact created with success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ManagerContactModel $contact)
    {
        return view('managerContacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ManagerContactModel $contact)
    {
        return view('managerContacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ManagerContactModel $contact)
    {
        ManagerContactModel::findOrFail($contact->id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:6',
            'contact' => 'required|digits:9|unique:manager_contacts,contact,' . $contact->id,
            'email' => 'required|email|unique:manager_contacts,email,' . $contact->id,
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $contact->update($request->all());

        return redirect()->route('managerContacts.index')
            ->with('success', 'Manager Contact updated with success..');
    }

    /**
     * Remove the specified resource from storage.
     * Used for softDelete
     */
    public function destroy(ManagerContactModel $contact)
    {
        $contact->delete();

        return redirect()->route('managerContacts.index')
            ->with('success', 'Manager Contact deleted with success.');
    }

}
