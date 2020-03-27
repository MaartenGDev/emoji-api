<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $casts = [
      'group_id' => 'integer'
    ];

    protected $fillable = [
        'icon', 'title', 'description', 'position'
    ];
}
