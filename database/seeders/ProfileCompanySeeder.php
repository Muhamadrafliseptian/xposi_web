<?php

namespace Database\Seeders;

use App\Models\ProfileCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfileCompany::create([
            "company_image" => "https://images.unsplash.com/photo-1661637051124-15a46f74f30b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
            "company_name" => "XPOSI",
            "company_address" => "Jakarta Selatan",
            "company_phone_number" => 6281411126356,
            "company_description" => "lorem ipsum",
            "company_email" => "xposi@gmail.com"
        ]);
    }
}
