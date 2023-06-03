<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');

    }
    public function country()
    {
        return $this->belongsToMany(Country::class, 'post_country', 'post_id', 'country_id');
    }
    //belongsToMany table posts_tags
    public function posts_tags()
    {
        return $this->belongsToMany(PostsTags::class, 'post_posts_tags', 'post_id', 'posts_tags_id');
    }
}
