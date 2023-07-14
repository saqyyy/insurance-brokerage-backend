<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Policy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = Client::all();
        foreach ($clients as $client) {
            $client->policies()->saveMany(Policy::factory(10)->create());
        }
    }
}
