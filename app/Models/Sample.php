<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $table='sample';

    protected $primaryKey = 'id';

    public function user()
    {
    	return $this->belongsTo(User::class,'user_id','user_id')->withDefault();
    }

    public function kit()
    {
    	return $this->belongsTo(Kit::class,'kit_id','kit_id')->withDefault();
    }
    public function sample_report()
    {
        return $this->belongsTo(SampleReport::class,'sample_code','sample_id')->withDefault();
    }
}
