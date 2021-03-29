<?php

namespace Tests\Unit;

use App\Models\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testPerson(): void
    {
        $person = new Person('080199-11111', 'Anna Beka', 'note');

        $this->assertEquals('08019911111', $person->code());
        $this->assertEquals('Anna Beka', $person->name());
        $this->assertEquals('note', $person->description());
    }
}

