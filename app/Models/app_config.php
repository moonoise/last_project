<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class app_config extends Model
{
    use HasFactory;
    protected $table = 'app_config';
    protected $fillable = ['configname','configvalue'];

}
