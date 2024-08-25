<?php

namespace App\Models\Admin ;

use App\Models\City;
use App\Models\Contract;
use App\Models\Picture;
use App\Models\Subscription;
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
        'sold',
        'rent_advance',
        'rent_prepaid',
        'cee',
        'commission',
        'visit_fees'
    ] ; 

    public function slug()  {
        return Str::slug($this->title) ; 
    }

    public function city() : BelongsTo {
        return $this->belongsTo(City::class) ; 
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class) ; 
    }

    public function contract() {
        return $this->hasOne(Contract::class) ; 
    }

    public function subscription() {
        $this->belongsTo(Subscription::class) ; 
    }

}
