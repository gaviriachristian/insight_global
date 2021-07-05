<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id', 'key_id', 'technician_id'];

    public function vehicle() {
        return $this->belongsTo('App\Models\Vehicle');
    }

    public function key() {
        return $this->belongsTo('App\Models\Key');
    }

    public function technician() {
        return $this->belongsTo('App\Models\Technician');
    }
}
