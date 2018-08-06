<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    // Table Name
    protected $table = 'competitions';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
