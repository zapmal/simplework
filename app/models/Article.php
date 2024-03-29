<?php

class Article extends Eloquent {

    protected $guarded = [];
    
    public function author() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}