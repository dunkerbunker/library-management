<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrow extends Model
{
    use HasFactory;

    protected $table = 'borrows';
    protected $primaryKey = 'id';

    
}
