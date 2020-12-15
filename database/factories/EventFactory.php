<?php

namespace Database\Factories;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $menu = "";
        for ($i=0; $i < 10; $i++) {
            $menu = $menu .'<p><b>'. $this->faker->city.'</b><br>' . $this->faker->text(75) . '</p>';
        }

        return [
            'name' => $this->faker->country,
            'date' => Carbon::now()->addDays($this->faker->numberBetween(10,90)),
            'time' => Carbon::createFromTime($this->faker->numberBetween(10,19)),
            'duration' => $this->faker->numberBetween(30,240),
            'content' => '
            <h3 class="font-sche text-2xl md:text-3xl font-bold">'.$this->faker->name.'</h3>
            <p>'. $this->faker->text(300). '</p>',
            'content2' => '
            <h3 class="font-sche text-2xl md:text-3xl font-bold">Menu</h3>' . $menu,
            'button_text' => 'Book Bord',
            'button_link' => $this->faker->url,
            'price' => $this->faker->numberBetween(199,999),
            'online' => true,
        ];
    }
}
