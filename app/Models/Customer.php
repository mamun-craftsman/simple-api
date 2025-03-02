<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'type',
        'email',
        'city',
        'state'
    ];

    public function invoices() {
        return $this->hasMany(Invoices::class);
    }
}
