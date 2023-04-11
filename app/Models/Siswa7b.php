<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Siswa7b extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasApiTokens, Authenticatable, Authorizable;

    protected $guarded = [];
    protected $table = "siswa7bs";
    protected $dates = ['deleted_at'];
    protected $appends = ['link'];


    public function spps()
    {
        return $this->morphMany(Spp::class, 'NIS');
    }

    public function siswas()
    {
        return $this->hasOne(LoginApp::class, 'NIS');
    }
    public function getLinkAttribute()
    {
        return url('/fotosiswa7b') . '/'. $this->foto;
    }
}
