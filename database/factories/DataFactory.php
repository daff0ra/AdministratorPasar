<?php
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Data;

class DataFactory extends Factory
{
    public function definition(): array
    {
        return [
            'Jumlah_penghasilan' => fake()->numberBetween(0, 100),
            'jumlah_pembeli' => fake()->numberBetween(0, 100),
            'tanggal' => fake()->date(),
        ];
    }
}
