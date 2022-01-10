<?php

namespace Database\Seeders;

use App\Models\ClientContact;
use Illuminate\Database\Seeder;

class ClientContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClientContact::factory(300)->create();
    }
}
