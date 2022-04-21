<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

use App\Models\Contact;

class ContactRepository 
{
    protected $contactModel;

    public function __construct()
    {
        $this->contactModel = new Contact();
    }

    public function showAll()
    {
        $arr = $this->contactModel->get();

        return response()->json($arr, 200);
    }

    public function showOne(int $contactId)
    {
        $arr = [];

        $showContact = $this->contactModel->where('id', $contactId)->first();

        if ($showContact) {
            $arr = $showContact;
        } else {
            $arr = null;
        }

        return response()->json($arr, 200);
    }

    public function store($params)
    {
        $newContact = $this->contactModel;

        try {
            $validation = $this->validation($params);

            if($validation) {
                return $validation;
            }

            $newContact->name = $params['name'];
            $newContact->contact = $params['contact'];
            $newContact->email = $params['email'];

            $newContact->save();
        } catch (\Exception $e) {
            return back()->withInput()->with('status', 'Houve um erro ao tentar salvar'); 
        }

        return redirect('/', 201);
    }

    public function update($params, $contactId)
    {
        $updateContact = $this->contactModel;

        try {
            $validation = $this->validation($params);

            if($validation) {
                return $validation;
            }

            $updateContact->where('id', $contactId)->update([
                'name' => $params['name'],
                'contact' => $params['contact'],
                'email' => $params['email']
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->with('status', 'Houve um erro ao tentar atualizar'); 
        }
        
        return redirect('/')->setStatusCode(200);
    }

    public function delete($contactId)
    {
        $deleteContact = $this->contactModel;

        try {
            $deleteContact->where('id', $contactId)->delete();
        } catch (\Exception $e) {
            return back()->withInput()->with('status', 'Houve um erro ao tentar deletar'); 
        }

        return redirect('/')->setStatusCode(200);
        //return Redirect::to('/');
    }

    public function validation($params)
    {
        $arr = ['status' => ''];

        if (!$params['name']) {
            $arr = ['status' => 'You need to fill in the Name field!'];    
        } 
        else if (strlen($params['name']) < 5) {
            $arr = ['status' => 'The field cannot be less than 5 characters!'];    
        } 
        else if (!$params['contact']) {
            $arr = ['status' => 'You need to fill in the Contact field!'];  
        }
        else if (strlen($params['contact']) < 9) {
            $arr = ['status' => 'The field cannot be less than 9 characters!'];  
        }
        else if (!$params['email']) {
            $arr = ['status' => 'You need to fill in the E-mail field!'];
        } 
 
        if (strlen($arr['status'])) {
            return back()->withInput()->with('status', $arr['status']);
        }
    }
}