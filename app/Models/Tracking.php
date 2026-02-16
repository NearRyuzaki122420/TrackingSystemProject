<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $fillable = [
    'tracking_number',
    'customer_name',
    'status'
];
}
