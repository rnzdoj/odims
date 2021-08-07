<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dratshang extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function monks(){
        return $this->hasMany(Monk::class);
    }
    public function rabdey(){
        return $this->belongsTo(Rabdey::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
}
