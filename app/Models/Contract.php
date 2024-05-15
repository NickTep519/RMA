<?php

namespace App\Models;

use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_name',
        'tenant_phone',
        'npi',
        'profession',
        'rent',
        'contract_number'
    ] ; 

    public function property() {
        return $this->belongsTo(Property::class) ; 
    }

    public function user() {
        return $this->belongsTo(User::class) ; 
    }
}
