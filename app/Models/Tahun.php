<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tahun extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = ['tahuns'];
    protected $dates = ['deleted_at'];

    public function spp()
    {
        return $this->hasMany(Spp::class);
    }


}
