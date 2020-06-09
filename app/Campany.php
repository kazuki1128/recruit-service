<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campany extends Model
{
    protected $fillable = ['content', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
