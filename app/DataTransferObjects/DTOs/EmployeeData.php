<?php

namespace App\DataTransferObjects\DTOs;

class EmployeeData
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public int $company_id,
        public ?string $email,
        public ?string $phone,
    ) {
    }

    public function toArray()
    {
        return [
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "company_id" => $this->company_id,
            "email" => $this->email,
            "phone" => $this->phone,
        ];
    }
}
