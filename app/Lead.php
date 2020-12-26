<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        "first_name",
        "last_name",
        "phone",
        "email",
        "img"
    ];
}
