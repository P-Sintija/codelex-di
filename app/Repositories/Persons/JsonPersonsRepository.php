<?php
namespace App\Repositories\Persons;

use App\Models\Person;

class JsonPersonsRepository implements PersonsRepository
{

    public function save(Person $person): void
    {
        var_dump('saving person in JSON database');
    }
}