<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['place_name', 'date', 'oplata', 'status'])]
class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
