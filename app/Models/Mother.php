<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mother extends Model
{
    use HasFactory;
    protected $fillable = [
        'cid',
        'name',
    ];
    public function monk(){
        return $this->belongsTo(Monk::class);
    }
}