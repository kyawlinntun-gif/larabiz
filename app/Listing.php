<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    // One to Many Reply
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
