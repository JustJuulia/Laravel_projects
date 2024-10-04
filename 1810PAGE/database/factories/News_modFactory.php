<?php
namespace Database\Factories;
use App\Models\User;
use App\Models\News_mod;
use Illuminate\Database\Eloquent\Factories\Factory;

class News_modFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News_mod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'n_title' => $this->faker->sentence,
            'n_content' => $this->faker->paragraph,
            'n_author_id' => User::factory(), // Jeśli korzystasz z fabryki użytkownika, pamiętaj o zaimportowaniu klasy User
            'n_date' => $this->faker->dateTime,
        ];
    }
}