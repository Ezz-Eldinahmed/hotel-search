<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $suppliers = ['supplier_a', 'supplier_b', 'supplier_c', 'supplier_d'];

        foreach ($suppliers as $supplier) {
            Hotel::factory()
                ->count(15) // create 15 hotels per supplier
                ->fromSupplier($supplier)
                ->create();
        }

        $duplicateName = 'Grand Plaza Hotel';

        foreach ($suppliers as $supplier) {

            Hotel::factory()->fromSupplier($supplier)->create([
                'name' => $duplicateName,
                'location' => 'Cairo, Egypt',
                'price_per_night' => fake()->randomFloat(2, 80, 150),
                'rating' => 4.5
            ]);
        }
    }
}
