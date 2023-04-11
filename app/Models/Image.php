<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostExtra;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'image',
        'post_extras_id',
    ];

    protected $dates = ['deleted_at'];
    protected $appends = ['link'];

    
    public function post_extras(){
        return $this->belongsTo(PostExtra::class);
    }

    public function getLinkAttribute()
    {
        return url('/images') . '/' . $this->image;
    }
}
