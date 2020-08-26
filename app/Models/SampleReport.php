<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleReport extends Model
{
    protected $table='sample_report';

    protected $primaryKey = 'id';

    public function esv()
    {
    	return $this->belongsTo(Esv::class,'esv_id','esv_id')->withDefault();
    }
}
