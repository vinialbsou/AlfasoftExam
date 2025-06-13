<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\helper\RequestValidatorHelper;
use App\Models\ManagerContact;

class ManagerContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = ManagerContact::all();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateContact($request);

        ManagerContact::create($request->all());

        return redirect()->route('contacts.index')
            ->with('success', 'Contato criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ManagerContact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ManagerContact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ManagerContact $contact)
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

        return redirect()->route('contacts.index')
            ->with('success', 'Contato atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     * Used for softDelete
     */
    public function destroy(ManagerContact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contato excluído com sucesso.');
    }

}
