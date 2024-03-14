<?php

namespace App\Models;

use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Picture extends Model
{
    use HasFactory ;

    protected $fillable = [
        'name'
    ] ; 

    public function property() : BelongsTo {
        return $this->belongsTo(Property::class)  ; 
    }
}
