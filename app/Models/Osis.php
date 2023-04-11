<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Osis extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = "osis";
    protected $dates = ['deleted_at'];
    protected $appends = ['link'];

    public function getLinkAttribute()
    {
        return url('/fotoosis') . '/' . $this->foto;
    }
}
