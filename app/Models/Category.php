<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = ['name'];


    public function news()
    {
        return $this->hasMany(News::class);
    }


    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class)
            ->withTimestamps();
    }
}
