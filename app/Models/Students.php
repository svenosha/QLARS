<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'StdName',
        'StdEmail',
        'StdPhone',
        'StdPassword',
        'StdClass',
    ];

}
