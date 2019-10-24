<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    protected $table = 'pics';
    
    protected $fillable = [
        'uuid', 'name', 'path', 'creator_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->uuid = \Uuid::generate(4)->string;
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function requests()
    {
        return $this->hasMany(PicRequest::class);
    }
}