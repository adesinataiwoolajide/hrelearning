<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
    protected $table = 'learners';
    protected $fillable = [
        'learner_name', 'email', 'phone', 'sex', 'partner_id', 'learner_type',
    ];
}
