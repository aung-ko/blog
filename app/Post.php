<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class); //string representation of full class path
    }

    public function addComment($body)
    {
        // $this->comments()->create(compact('body'));
        Comment::create([
            'body' => $body,
            'post_id' => $this->id,
            'user_id' => auth()->id(),
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filter)
    {
        // dd($filter);
        if (array_key_exists('month', $filter)) {
            $query->whereMonth('created_at', Carbon::parse($filter['month'])->month);
        }

        if (array_key_exists('year', $filter)) {
            $query->whereYear('created_at', $filter['year']);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) as year,monthname(created_at) as month,count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
