<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_company', function (Blueprint $table) {
            $table->id();
            $table->string("company_image");
            $table->string("company_name");
            $table->string("company_address");
            $table->char("company_phone_number", 15);
            $table->text("company_description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_company');
    }
};
