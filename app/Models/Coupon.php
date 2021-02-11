<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    public function scopefinder($query,$code){
        return $query->where('code',$code);
    }
    public function discount($total){
        if($this->type=='fixed'){
            return $this->value;
        }elseif($this->type=='percent'){
                return $total*$this->percent_off/100;
        }else{
            return 0;
        }
    }
}
