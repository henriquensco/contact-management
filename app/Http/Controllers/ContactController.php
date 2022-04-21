<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Repositories\ContactRepository;

class ContactController extends Controller
{

    protected $contactRepository;

    public function __construct()
    {
        $this->contactRepository = new ContactRepository();
    }
    
    public function showAll()
    {
        $req = $this->contactRepository->showAll();

        return $req;
    }

    public function showOne(int $contactId)
    {
        $req = $this->contactRepository->showOne($contactId);

        return $req;
    }

    public function store(Request $request)
    {
        $req = $this->contactRepository->store($request->all());

        return $req;
    }

    public function update(Request $request) 
    {
        $req = $this->contactRepository->update($request->all(), $request->id);

        return $req;
    }

    public function delete(int $contactId)
    {
        $req = $this->contactRepository->delete($contactId);

        return $req;
    }
    
}
