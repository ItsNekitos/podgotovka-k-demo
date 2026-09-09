<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['description'])]
class Comment extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
