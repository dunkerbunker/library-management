<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrow extends Model
{
    use HasFactory;

    protected $table = 'borrows';
    protected $primaryKey = 'id';
    protected $fillable = ['return_date', 'late_return_status'];

    public function borrower()
    {
        return $this->BelongsTo(Borrower::class);
    }

    public function lateReturn()
    {
        return $this->hasOne(LateReturn::class);
    }

    public function book()
    {
        return $this->BelongsTo(Book::class);
    }
    
}
