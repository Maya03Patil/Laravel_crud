<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author'];

    // Mutator to convert title to lowercase before saving to the database
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }

    // Accessor to capitalize the first letter of title when retrieving it
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }
}
