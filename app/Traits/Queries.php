<?php

namespace App\Traits;

trait Queries
{
    public function select($tablename)
    {
        return 'SELECT * FROM ' . $tablename . ' LIMIT 5';
    }
}
