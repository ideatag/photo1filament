<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'user_id'];

    protected $casts = [ 'user_id' => 'integer'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}

