<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gewog extends Model
{
    use HasFactory;
    protected $fillable = ['name','dzongkhag_id'];
    public function address(){
        return $this->hasMany(Address::class);
    }
    public function dzongkhag(){
        return $this->belongsTo(Dzongkhag::class);
    }
    public function villages(){
        return $this->hasMany(Village::class);
    }
}
