<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part2 extends Model
{
    use HasFactory;
    protected $table = 'part2';
    protected $fillable = ['part1_id','personneltype','office',
                        'division','position','positionlevel','position2','positionlevel2'];
   /**
    * Get the user that owns the part2
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function part1()
   {
       return $this->belongsTo(Part1::class,'part1_id');
   }


}
