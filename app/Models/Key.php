<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;

    public function vehicles() {
        return $this->belongsToMany('App\Models\Vehicle');
    }

    public function orders() {
        return $this->hasMany('App\Models\Order');
    }
}
