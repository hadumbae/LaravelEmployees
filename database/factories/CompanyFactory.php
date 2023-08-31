<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Company;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->safeEmail,
            'website' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'logo' => $this->faker->regexify('[A-Za-z0-9]{10}'),
        ];
    }
}
