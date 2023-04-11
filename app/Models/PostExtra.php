<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostExtra extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'judul',
        'cover',
        'jadwal',
        'jam',
        'lokasi',
        'tentang'

    ];
    protected $dates = ['deleted_at'];

    public function images(){
        return $this->hasMany(Image::class, 'post_extras_id','id');
    }
}
