<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class app_content extends Model
{
    use HasFactory;
    protected $table = 'app_content';
    protected $fillable = ['contentvalue'];

}
