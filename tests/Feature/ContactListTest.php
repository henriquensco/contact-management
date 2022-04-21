<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;



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
        
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_show_one_contact()
    {
        $response = $this->get("/contact/78");
        
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_new_contact()
    {

        $this->post('/store', 
        [
            'name' => 'Henriquee',
            'contact' => '883333385',
            'email' => 'henrique@gmia.com'
        ])->assertStatus(Response::HTTP_CREATED);

    }

    public function test_update_contact()
    {

        $this->putJson('/update/6', ['name' => 'Henriquee', 'contact' => '111111111', 'email' => 'henrique@gmia.com'])
            ->assertStatus(Response::HTTP_OK);

    }

    public function teste_delete_contact()
    {
        $this->delete('/delete/76')->assertStatus(Response::HTTP_OK);
    }

}
