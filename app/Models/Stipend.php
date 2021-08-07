<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Stipend extends Model
{
    use HasFactory;
    protected $fillable = ['status'];
    public function monk(){
        return $this->belongsTo(Monk::class);
    }
    public function isPast(){
        $now = Carbon::now();
        $current_month = $now->month;
        $current_year  = $now->year;
        $old_month =  $this->created_at->month;
        $old_year = $this->created_at->year;
        if($old_month < $current_month || $old_year < $current_year ){
            return true;
        }else {
            return false;
        }
    }
}
