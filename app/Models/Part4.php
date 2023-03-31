<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part4 extends Model
{
    use HasFactory;
    protected $table = 'part4';
    protected $fillable = ['part1_id','choices','coursename','generation','period','institution'];

    /**
     * Get the user that owns the Part4
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Part1::class, 'part1_id');
    }
}
