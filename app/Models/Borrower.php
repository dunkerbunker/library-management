<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;
    protected $table = 'borrowers';
    protected $primaryKey = 'id';
    protected $fillable = ['borrower_name', 'IC', 'phone_no', 'address'];

    public function borrows()
     {
         return $this->hasMany(Borrow::class);
     }
}
