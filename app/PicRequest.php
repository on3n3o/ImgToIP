<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PicRequest extends Model
{
    protected $table = 'requests';
    
    protected $fillable = [
        'pic_id', 'request', 'ip'
    ];

    protected $casts = [
        'pic_id' => 'integer',
        'request' => 'array'
    ];

    public function pic()
    {
        return $this->belongsTo(Pic::class);
    }
}