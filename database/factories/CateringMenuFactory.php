<?php

namespace Database\Factories;

use App\Models\CateringMenu;
use App\Models\CateringType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CateringMenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CateringMenu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->city,
            'description' => $this->faker->text(150),
            'menu' => $this->faker->paragraphs(3,true),
            'price' => $this->faker->numberBetween(199,499),
            'catering_type_id' => $this->faker->numberBetween(1, count(CateringType::all())),
        ];
    }
}
