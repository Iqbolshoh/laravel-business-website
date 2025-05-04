<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about'; 
    protected $fillable = ['title', 'text_1', 'text_2', 'image'];
}
