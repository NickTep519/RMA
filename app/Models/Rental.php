<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'month',
        'payment_status',
        'prev_payment_status',
    ] ; 

    protected $dates = [
        'month'
    ] ; 

    public function contract() {
        return $this->belongsTo(Contract::class) ; 
    }
}
