<?php

namespace App\Models\Admin ;

use App\Models\City;
use App\Models\Picture;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use illuminate\Support\Str ; 

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

    public function slug()  {
        return Str::slug($this->title) ; 
    }

    public function specificities() : BelongsToMany{
        return $this->belongsToMany(Specificity::class)  ; 
    }

    public function city() : BelongsTo {
        return $this->belongsTo(City::class) ; 
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class) ; 
    }

    public function images() : HasMany {
        return $this->hasMany(Picture::class) ; 
    }

    public function tenant(): HasOne {
        return $this->hasOne(Tenant::class) ; 
    }
}
