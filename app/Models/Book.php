<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $fillable = ['ISBN', 'year', 'book_title', 'author', 'publisher_name', 'category'];

    public function borrows() 
    {
        return $this->hasMany(Borrow::class);
    }
}
