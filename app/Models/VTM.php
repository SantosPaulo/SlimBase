<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VTM extends Model
{
    protected $table = 'VTM';

    protected $fillable = [
        'VTMID',
        'INVALID',
        'NM',
        'ABBREVNM',
        'VTMIDPREV',
        'VTMIDDT',
    ];
}
