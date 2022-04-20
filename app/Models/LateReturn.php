<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LateReturn extends Model
{
    use HasFactory;

    protected $table = 'late_returns';
    protected $primaryKey = 'id';
    protected $fillable = ['late_return_fines', 'payment', 'date_of_payment', 'overdue_days'];
    
    public function borrow()
    {
        return $this->BelongsTo(Borrow::class);
    }
}
