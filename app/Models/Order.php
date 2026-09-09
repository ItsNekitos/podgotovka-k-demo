<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['place_name', 'date', 'oplata'])]
class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
