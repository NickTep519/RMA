<?php

namespace App\Models;

use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function user() : BelongsTo {
        return $this->belongsTo(User::class) ; 
    }


    public function property() : BelongsTo {
        return $this->belongsTo(Property::class) ; 
    }

    public function rentals() : HasMany {
        return $this->hasMany(Rental::class) ; 
    }
}
