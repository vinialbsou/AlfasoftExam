<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormValidationTest extends TestCase
{
    use RefreshDatabase;

     public function test_create_contact_validation_errors()
    {
        $response = $this->post(route('managerContacts.store'), []); 

        //check the assert data
        $response->assertSessionHasErrors(['name', 'email', 'phone']); 
    }

    public function test_edit_contact_validation_errors()
    {

        $contact = \App\Models\ManagerContactModel::factory()->create();

        $response = $this->put(route('managerContacts.update', $contact->id), [
            'name' => '', 
            'email' => 'not-an-email',
            'phone' => '',
        ]);

        //Checkl the assert edit
        $response->assertSessionHasErrors(['name', 'email', 'phone']);
    }
}
