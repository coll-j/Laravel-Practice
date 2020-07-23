<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $fillable = [
        'id_query', 'username', 'body', 'approved'
    ];

    protected $attributes = [
        'approved' => false
    ];
}
