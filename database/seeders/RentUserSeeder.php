<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'alice',
            'email' => 'alice@mail.com',
            'tel' => '6288888888',
            'address' => 'Jakarta Raya',
            'license' => '0',
            'password' => bcrypt('123'),
            'is_admin' => false
        ]);
    }
}
