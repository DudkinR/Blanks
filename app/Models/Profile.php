<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    // table
    protected $table = "profile";
    // fillable
    protected $fillable = [
        "time",
        "sex",
        "help",
        "money",
        "image",
        "size",
        "color",
        "background",
        "lang",
        "lpanel",
        "rpanel",
        "tpanel",
        "bpanel",
    ];
    // user_id as  key
    protected $primaryKey = "user_id";
    // user
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
