<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title','year','status'];

    public function authors() {
        return $this->belongsToMany(Author::class);
    }
}
