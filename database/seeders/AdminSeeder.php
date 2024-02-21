<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        admin::create([
            'name' => 'ADMIN',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'status' => 1
        ]);

    }
}
