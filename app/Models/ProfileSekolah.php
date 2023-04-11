<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileSekolah extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = "profile_sekolahs";
    protected $dates = ['deleted_at'];
    protected $appends = ['link'];

    public function getLinkAttribute()
    {
        return url('/fotosekolah') . '/' . $this->foto;
    }
}
