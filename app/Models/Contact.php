<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function condition()
    {
        return $this->belongsTo('App\Models\Condition');
    }

    public function design()
    {
        return $this->belongsTo('App\Models\Design');
    }
}
