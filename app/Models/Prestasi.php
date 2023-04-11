<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestasi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = "prestasis";
   	protected $dates = ['deleted_at'];

    public function juara()
    {
        return $this->belongsTo(Juara::class);
    }

}
