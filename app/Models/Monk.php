<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monk extends Model
{
    use HasFactory;
    protected $fillable = [
        'cid',
        'regno',
        'dob',
        'choename',
        'regage',
        'year',
        'image',
        'position_id',
        'education_id',
        'dratshang_id'
    ]; 
    public function address(){
        return $this->hasOne(Address::class);
    }
    public function mother(){
        return $this->hasOne(Mother::class);
    }
    public function father(){
        return $this->hasOne(Father::class);
    }
    public function stipends(){
        return $this->hasMany(Stipend::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function education(){
        return $this->belongsTo(Education::class);
    }
    public function position(){
        return $this->belongsTo(Position::class);
    }
    // public function rabdey(){
    //     return $this->belongsTo(Rabdey::class);
    // }
    public function dratshang(){
        return $this->belongsTo(Dratshang::class);
    }
}
