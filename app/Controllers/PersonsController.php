<?php

namespace App\Controllers;

use App\Services\Persons\StorePersonRequest;
use App\Services\Persons\StorePersonService;


class PersonsController
{

    private StorePersonService $service;

    public function __construct(StorePersonService $service)
    {
        $this->service = $service;
    }


    public function index()
    {
        return 'show list of persons';
    }

    public function store()
    {
        //todo Validācija:piemēram- (new Validator([])) - iedod iekšā masīvu ar pieprasījumiem, varbūt try/cach blokā iekšā
        // validētu $_POST
        //validate if there is code, name and description


        $person = $this->service->execute(
            new StorePersonRequest(
                $_POST['code'],
                $_POST['name'],
                $_POST['description']
            ));


        return json_encode($person->toArray());
    }

}
