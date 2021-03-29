<?php

namespace App\Services\Persons;

use App\Models\Person;
use App\Repositories\Persons\PersonsRepository;

class StorePersonService
{

    private PersonsRepository $personsRepository;

    public function __construct (PersonsRepository $personsRepository)
    {
        $this->personsRepository =$personsRepository;
    }

    public function execute(StorePersonRequest $request): Person
    {
        $person = new Person (
            $request->code(),
            $request->name(),
            $request->description()
        );

        $this->personsRepository->save($person);

        return $person;
    }
}

