<?php

namespace App\Models;

use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subscription extends Model
{

    use HasFactory;

    protected $fillable = [
        'plan',
        'start_at',
        'end_at'
    ] ; 


    public function user() : BelongsTo {
        return $this->belongsTo(User::class) ; 
    }

    public function properties() : HasMany {
        return $this->hasMany(Property::class) ;  
    }

}
