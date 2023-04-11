<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WaliKelas extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $guarded = [];
    protected $table = "wali_kelas";
    protected $dates = ['deleted_at'];
    protected $appends = ['link'];

    public function getLinkAttribute()
    {
        return url('/fotowalikelas') . '/' . $this->foto;
    }
}
