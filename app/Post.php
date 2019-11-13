<?php

namespace App;

use App\Scopes\PublishedScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = ['title', 'content','slug', 'owner_id'];
    protected $dates = ['published_at', 'created_at', 'deleted_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new PublishedScope());
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

}
