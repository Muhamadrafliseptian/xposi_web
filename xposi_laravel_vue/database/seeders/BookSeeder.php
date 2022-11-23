<?php

namespace Database\Seeders;

use App\Models\HowBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HowBook::create ([
            "icon_book" => "fas fa-user",
            "title_book" => "Download Apk",
            "description_book" => "lorem",
        ]);
        HowBook::create ([
            "icon_book" => "fas fa-user",
            "title_book" => "Download Apk",
            "description_book" => "lorem",
        ]);
        HowBook::create ([
            "icon_book" => "fas fa-user",
            "title_book" => "Download Apk",
            "description_book" => "lorem",
        ]);
    }
}
