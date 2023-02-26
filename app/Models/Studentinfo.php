<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentinfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'lrn', 'firstname', 'lastname', 'birthdate',
        'sex', 'province', 'town', 'guardian', 'guardian_address',
        'elem_school', 'elem_school_year', 'elem_years', 'gen_ave'
    ];
}
