<?php

namespace App\DataTransferObjects\DTOs;

class CompanyData
{
    public function __construct(
        public string $name,
        public ?string $email,
        public ?string $website,
        public ?string $logo
    ) {
    }

    public function toArray()
    {
        return [
            "name" => $this->name,
            "email" => $this->email,
            "website" => $this->website,
            "logo" => $this->logo
        ];
    }
}
