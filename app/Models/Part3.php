<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part3 extends Model
{
    use HasFactory;
    protected $table = 'part3';
    protected $fillable = ['part1_id','edudegree','eduqualification','eduinstitution','eduyear'];

    /**
     * Get the user that owns the part3
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function part1()
    {
        return $this->belongsTo(Part1::class, 'part1_id');
    }
}
