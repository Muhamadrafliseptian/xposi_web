<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileCompany extends Model
{
    protected $table = "profile_company";

    protected $guarded = [""];

    use HasFactory;
}
