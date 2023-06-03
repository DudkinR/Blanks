<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // $table
    protected $table = 'categories';
    // $fillable
    protected $fillable = [
        'name',
        'slug',
        'lang',
        'author_id',
        'parent_id',
        'description',
        'image',
        'image_own',
        'status',
    ];
   //belongtomany relationship with cattegory
   public function blanks()
   {
       return $this->belongsToMany(Blank::class, 'blank_category', 'category_id', 'blank_id');
   }
   public function language()
   {
       return $this->belongsTo(Language::class,'lang', 'language_code');
   }
   public function projects(){
    return $this->belongsToMany(
        Project::class,
        
        "project_id","category_id"
        );
    }
   public function categories()
   {
       return $this->HasMany(Category::class, 'parent_id', 'id');
   }
   public function positions()
   {
       return $this->belongsToMany(Position::class, 'position_category', 'category_id', 'position_id');
   }
   public function author()
   {
       return $this->hasOne(User::class, 'id', 'author_id');
   }
   public function icon()
   {
       
       return $this->hasOne(Icon::class, 'id', 'image');
      // return $this->image;

   }
   protected function withDefault($relations){
    $relations[] = 'icon';
    $relations[] = 'positions';
    $relations[] = 'categories';
    $relations[] = 'language';
    $relations[] = 'blanks';
    return $relations;
  }
}
