<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $fillable = [
        'id_query', 'username', 'body'
    ];

    protected $attributes = [
        'approved' => false
    ];
}
