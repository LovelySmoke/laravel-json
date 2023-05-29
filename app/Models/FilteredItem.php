<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilteredItem extends Model
{   
    protected $fillable = ['title', 'data'];

    protected $casts = ['data' => 'json'];
}