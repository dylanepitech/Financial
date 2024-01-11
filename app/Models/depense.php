<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class depense extends Model
{
    use HasFactory;
    protected $fillable = ['facture_name', 'facture_date', 'facture_tarif', 'user_id'];
}
