<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rabdey extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function dratshangs(){
        return $this->hasMany(Dratshang::class);
    }
    // public function monks(){
    //     return $this->hasMany(Monk::class);
    // }

}
