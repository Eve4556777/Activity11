<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Universe extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'universe',
        'company',
        'age',
        'new_column'
    ];
}