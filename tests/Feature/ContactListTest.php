<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;

use App\Repositories\ContactRepository;

class ContactListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_show_contacts()
    {   
        $response = $this->get('/');
        
        $response->assertStatus(200);
    }

    public function test_show_one_contact()
    {
        $response = $this->get("/contact/6");
        
        $response->assertStatus(200);
    }

    public function test_new_contact()
    {

        $this->post('/store', 
        [
            'name' => 'Henriquee',
            'contact' => '883333385',
            'email' => 'henrique@gmia.com'
        ])->assertStatus(201);

    }

    public function test_update_contact()
    {

        $this->put('/update/8', 
        [
            'name' => 'Henriquee',
            'contact' => '883333385',
            'email' => 'henrique@gmia.com'
        ])->assertStatus(200);

    }

    public function test_delete_contact()
    {
        $this->delete('/delete/8')->assertStatus(200);
    }
}
