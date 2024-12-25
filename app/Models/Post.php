<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Disable automatic timestamp management
    public $timestamps = false;

    // Define the attributes that are mass assignable
    protected $fillable = ['title', 'content', 'created_at'];

    // Optionally, you can define the date format for the created_at column
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = now();
        });
    }
}
