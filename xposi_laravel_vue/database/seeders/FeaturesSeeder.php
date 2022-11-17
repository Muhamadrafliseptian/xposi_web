<?php

namespace Database\Seeders;

use App\Models\Features;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Features::create([
            "icon_features" => "fas fa-user",
            "title_features" => "keren",
            "description_features" => "keren",
        ]);
    }
}
