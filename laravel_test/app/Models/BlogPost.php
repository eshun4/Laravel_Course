<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    //If you have models that more columns than a few
    // Eloquent models allow mass assignment as a solution
    // You can mass assign some properties in your model with the fillable property below

    protected $fillable = [
        'title',
        'content',
    ];
    use HasFactory;

    public function comments(){
        return $this->hasMany(Comments::class);
    }
    
}
