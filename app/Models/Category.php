<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $tabe = 'categories';

    protected $fillable = [
        'name',
        'description',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}