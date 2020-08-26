<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserKit extends Model
{
    protected $table='user_kit';
    protected $primaryKey = 'user_kit_id';

    public function kit()
    {
    	return $this->belongsTo(Kit::class,'kit_id','kit_id')->withDefault();
    }
}
