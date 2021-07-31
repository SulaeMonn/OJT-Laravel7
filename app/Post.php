<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'description' , 'status'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
