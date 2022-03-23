<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
       'user_id', 'subject' , 'description', 'date'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
