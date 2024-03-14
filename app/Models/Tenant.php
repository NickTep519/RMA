<?php

namespace App\Models;

use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rent'
    ] ; 

    public function user() {
        return $this->belongsTo(User::class) ; 
    }

    public function property() {
        return $this->belongsTo(Property::class) ;  
    }
}
