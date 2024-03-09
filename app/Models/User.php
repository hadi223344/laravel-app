<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    // public function getNameAttribute($value)
    // {
    //     return ucfirst($value);
    // }


    // public function getCompany()
    // {
    //     return $this->hasMany(Company::class);
    // }
    // public function getJob()
    // {
    //     return $this->hasMany(Job::class);
    // }


    // protected function  name(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => ucfirst($value),
    //         set: fn ($value) =>  strtoupper($value)
    //     );
    // }

    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = 'Mr.' . $value;
    // }
}
