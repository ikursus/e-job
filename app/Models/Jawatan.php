<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawatan extends Model
{
    // Nama table yang digunakan oleh model ini
    protected $table = 'jawatan';

    // Senaraikan atribut yang boleh diisi secara mass assignment
    protected $fillable = [
        'title',
        'description',
        'status',
        'quota',
        'date_from',
        'date_till',
    ];
}
