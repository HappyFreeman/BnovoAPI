<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    //protected $table = 'visitors';

    //public static $wrap = "visitors";

    protected $fillable = ['email', 'first_name', 'last_name', 'phone', 'country'];


}
