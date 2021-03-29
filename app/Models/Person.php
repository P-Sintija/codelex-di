<?php

namespace App\Models;

class Person
{
    private string $code;
    private string $name;
    private string $description;

    public function __construct(string $code, string $name, string $description)
    {
        $this->setCode($code);
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

    public function toArray(): array
    {
        return [
            'code' => $this->code(),
            'name' => $this->name(),
            'description' => $this->description()
        ];
    }


    private function setCode(string $code): void
    {
        $code = str_replace('-', '', $code);
        $this->code = $code;
    }
}


