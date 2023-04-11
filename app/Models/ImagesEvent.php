<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImagesEvent extends Model
{
    use HasFactory;
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'image',
        'events_id',
    ];

    protected $dates = ['deleted_at'];
    protected $appends = ['link'];

    
    public function events(){
        return $this->belongsTo(Event::class);
    }

    public function getLinkAttribute()
    {
        return url('/images_events') . '/' . $this->image;
    }
}
