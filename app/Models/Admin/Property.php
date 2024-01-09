<?php

namespace App\Models\Admin ;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory ;

    protected $fillable = [
        'title', 
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'neighborhood',
        'sold'
    ] ; 

    public function specificities() : BelongsToMany{
        return $this->belongsToMany(Specificity::class)  ; 
    }

    public function city() : BelongsTo {
        return $this->belongsTo(City::class) ; 
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class) ; 
    }
}
