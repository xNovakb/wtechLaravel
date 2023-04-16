<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shipping;
use App\Models\Payment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Shipping::create([
            'id' => 1,
            'shipping_type' => 'XYBox',
            'price' => 1.49,
            'time_delivery' => 'do 24 hod.'
        ]);

        Shipping::create([
            'id' => 2,
            'shipping_type' => 'Predajňa',
            'price' => 0,
            'time_delivery' => 'Ihneď'
        ]);

        Shipping::create([
            'id' => 3,
            'shipping_type' => 'Zasielkovňa',
            'price' => 1.99,
            'time_delivery' => '2-3 dni'
        ]);

        Shipping::create([
            'id' => 4,
            'shipping_type' => 'Slovenská pošta',
            'price' => 1.99,
            'time_delivery' => '2-3 dni'
        ]);

        Shipping::create([
            'id' => 5,
            'shipping_type' => 'Doručenie na adresu (DPD)',
            'price' => 3.49,
            'time_delivery' => '3-5 dní'
        ]);

        Payment::create([
            'id' => 1,
            'payment_type' => 'Kreditná karta',
            'price' => -1.00
        ]);

        Payment::create([
            'id' => 2,
            'payment_type' => 'PayPal',
            'price' => -1.00
        ]);

        Payment::create([
            'id' => 3,
            'payment_type' => 'Dobierka',
            'price' => 1.99
        ]);

        Payment::create([
            'id' => 4,
            'payment_type' => 'Prevod na účet',
            'price' => 1.00
        ]);
    }
}
