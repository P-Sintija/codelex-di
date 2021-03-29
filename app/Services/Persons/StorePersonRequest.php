<?php
namespace App\Services\Persons;

class StorePersonRequest
{
    private string $code;
    private string $name;
    private string $description;

    public function __construct(
        string $code,
        string $name,
        string $description
    )
    {
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function description(): string
    {
        return $this->description;
    }


}


