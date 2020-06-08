<?php

namespace Stream;

use Stream\User;

use Stream\Video;
use Stream\Subscription;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Channel extends Model implements HasMedia


{
    use HasMediaTrait;



    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function image()
    {

        if ($this->media->first()) {
            return $this->media->first()->getFullUrl('thumb');
        }

        return null;
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(100)->height(100);
    }

    public function authU()
    {

        if (!auth()->check()) return false;
        # code...


        return $this->user_id === auth()->user()->id;
    }

    public function subscriptions()
    {

        return $this->hasMany(Subscription::class);
    }

    public function videos()
    {

        return $this->hasMany(Video::class);
    }
}
