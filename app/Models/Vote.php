<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'votes'; // Reference to the 'votes' table
    protected $fillable = ['subject', 'rating']; // Mass assignable fields
}
