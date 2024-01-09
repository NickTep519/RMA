<?php

namespace App\Models;

use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_city'
    ] ; 


    public function properties() : HasMany {
        return $this->hasMany(Property::class) ; 
    }
}
