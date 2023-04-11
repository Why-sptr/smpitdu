<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = "events";
    protected $dates = ['deleted_at'];
    protected $appends = ['link'];

    public function getLinkAttribute()
    {
        return url('/fotoevent') . '/' . $this->foto;
    }

    // public function status()
    // {
    //     return $this->belongsTo(StatusEvent::class);
    // }

    public function images_events(){
        return $this->hasMany(ImagesEvent::class, 'events_id','id');
    }
}
