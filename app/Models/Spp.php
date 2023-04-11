<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spp extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = "spps";
    protected $dates = ['deleted_at'];
    
    public function sppable()
    {
        return $this->morphTo(__FUNCTION__, 'NIS_type', 'NIS_id');
    }


}
