<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ShopFactory extends Factory
{
    protected $model = \App\Models\Shop::class;
    public function definition()
    {
       return [
            'name' => $this->faker->company,
            'user_id' => \App\Models\User::factory()->create(['role' => 'vendor'])->id,
            'slug' => Str::slug($this->faker->company),
            'description' => $this->faker->paragraph,
            'logo' => 'https://via.placeholder.com/150',
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'commission_rate' => $this->faker->randomFloat(2, 0, 20),
        ];
    }
}
