<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
