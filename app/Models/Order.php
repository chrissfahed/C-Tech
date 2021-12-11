<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id' , 'billing_name', 'billing_email',
        'billing_address', 'billing_phone',
        'billing_total', 'shipped'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function items()
    {
        return $this->belongsToMany('App\Models\Item')->withPivot('quantity');
    }
}
