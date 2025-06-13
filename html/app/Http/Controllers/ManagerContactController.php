<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\helper\RequestValidatorHelper;
use App\Models\ManagerContactModel;

class ManagerContactController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth')->except(['index', 'show']);
    }


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
        $validation = [
            -100 => [
                'nome' => 'required|string|max:65536',
                'email' => 'required|email',
                'data_nascimento' => 'required|date',
                'telefones' => 'required|numeric',
            ]
        ];

        $validationErrors = (new RequestValidatorHelper())->run($request, $validation);

        if ($validationErrors['errorCode'] < 0) {

            throw new \Exception('Validation error', 400);
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
        $validation = [
            -100 => [
                'nome' => 'required|string|max:65536',
                'email' => 'required|email',
                'data_nascimento' => 'required|date',
                'telefones' => 'required|numeric',
            ]
        ];

        $validationErrors = (new RequestValidatorHelper())->run($request, $validation);

        if ($validationErrors['errorCode'] < 0) {

            throw new \Exception('Validation error', 400);
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
