<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    protected $table = 'course_allocation';
    protected $fillable = [
        'course_id', 'partner_id', 'instructor_id', 'status',
    ];
}
