<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public const ADMIN = 1;
    public const MANAGER = 2;
    public const USER = 3;
    public const NAME = [
        'admin',
        'manager',
        'user'
    ];
    protected $fillable = [
        'id',
        'name',
    ];
    public function user(){
        return $this->hasOne(User::class);
    }
}
