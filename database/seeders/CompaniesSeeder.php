<?php

namespace Database\Seeders;

use App\Models\company;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        company::create([
            'company_id' => 1,
            'company_status' => 1,
            'company_name' => 'Demo',
            'company_email' => 'demo@gmail.com',
            'company_website' => 'www.demo.com',
        ]);

        company::create([
            'company_id' => 2,
            'company_status' => 1,
            'company_name' => 'Google',
            'company_email' => 'google@gmail.com',
            'company_website' => 'www.google.com',
        ]);

        company::create([
            'company_id' => 3,
            'company_status' => 1,
            'company_name' => 'Facebook',
            'company_email' => 'facebook@gmail.com',
            'company_website' => 'www.facebook.com',
        ]);

        company::create([
            'company_id' => 4,
            'company_status' => 1,
            'company_name' => 'YouTube',
            'company_email' => 'youtube@gmail.com',
            'company_website' => 'www.youtube.com',
        ]);

        company::create([
            'company_id' => 5,
            'company_status' => 1,
            'company_name' => 'Hotstar',
            'company_email' => 'hotstar@gmail.com',
            'company_website' => 'www.hotstar.com',
        ]);
    }
}
