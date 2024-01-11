<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entrer extends Model
{
    use HasFactory;

    protected $fillable = ['entrer_name', 'entrer_tarif', 'entrer_date', 'user_id'];
}
