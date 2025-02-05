<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    
    public function comments() {
    return $this->hasMany(Comment::class);
}

}