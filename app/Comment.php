<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'owner_id', 'post_id', 'content'
    ];


    public function author()
    {
        return $this->belongsTo(User::class);
    }

}
