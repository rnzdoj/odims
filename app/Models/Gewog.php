<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gewog extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function address(){
        return $this->hasMany(Address::class);
    }
}