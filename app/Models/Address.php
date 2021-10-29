<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function monk(){
        return $this->belongsTo(Monk::class);
    }
    public function dzongkhag(){
        return $this->belongsTo(Dzongkhag::class);
    }
    public function gewog(){
        return $this->belongsTo(Gewog::class);
    }
    public function village(){
        return $this->belongsTo(Village::class);
    }
}