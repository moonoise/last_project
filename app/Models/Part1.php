<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Part1 extends Model
{
    use HasFactory, Searchable;
    protected $table = 'part1';
    protected $fillable = [
    'prefix',
    'fname',
    'lname',
    'nickname',
    'birthdate',
    'age',
    'religion',
    'idcard',
    'royalorchidplusno',
    'bloodtype',
    'congenitaldisease',
    'lineid',
    'homeaddress',
    'workingaddress',
    'telephone',
    'fax',
    'mobile',
    'personfullname',
    'personrelationship',
    'personmobile',
    'enprefix',
    'enfname',
    'enlname',
    'enposition',
    'endivision',
    'endepartment',
    'enministry',
    'jobdescript','descriptapplyforjob','registerstatus'];

    /**
     * Get all of the comments for the Part1
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function part2()
    {
        return $this->hasMany(Part2::class, 'part1_id');
    }

    /**
     * Get all of the comments for the Part1
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function part3()
    {
        return $this->hasMany(Part3::class, 'part1_id');
    }

    /**
     * Get all of the comments for the Part1
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Part4()
    {
        return $this->hasMany(Part4::class, 'part1_id');
    }

    public function toSearchableArray()
    {
        return [
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email
        ];
    }

}
