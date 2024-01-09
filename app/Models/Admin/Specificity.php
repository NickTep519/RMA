<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Specificity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_speci'
    ] ; 


    public function properties() : BelongsToMany {
        return $this->belongsToMany(Property::class) ; 
    }
}
