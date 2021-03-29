<?php
namespace App\Repositories\Persons;

use App\Models\Person;

class MySQLPersonsRepository implements PersonsRepository
{

    public function save(Person $person): void
    {
        var_dump('svaing person in mysql database');
    }
}

