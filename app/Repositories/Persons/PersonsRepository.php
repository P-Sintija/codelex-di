<?php
namespace App\Repositories\Persons;

use App\Models\Person;

interface PersonsRepository
{
    public function save(Person $person): void;
}

