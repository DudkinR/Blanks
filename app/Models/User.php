<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
//Passport

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ["name", "email", "password", "api_token","suns"];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ["password", "remember_token"];
    public function generateApiToken()
    {
        $apiToken = new ApiToken();
        $apiToken->token = Str::random(60);
        $this->apiTokens()->save($apiToken);
        return $this->apiTokens(); // return the relationship instance
    }

    public function apiTokens()
    {
        //return $this->hasMany(ApiToken::class);
        if($this->api_token==null){
            $this->api_token=Str::random(60);
            $this->save();
        }
        return $this->api_token;
    }
    public function regen_api_Tokens()
    {
        $this->api_token=Str::random(60);
         $this->save();
        return $this->api_token;
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "email_verified_at" => "datetime",
    ];
    // blanks
    public function blanks()
    {
        return $this->hasMany(Blank::class, "author_id");
    }
    // categories
    public function categories()
    {
        return $this->hasMany(Category::class, "author_id");
    }
    // positions
    public function positions()
    {
        return $this->hasMany(Position::class, "author_id");
    }
    // problems
    public function problems()
    {
        return $this->hasMany(Problem::class, "author_id");
    }
    // items
    public function items()
    {
        return $this->hasMany(Item::class, "author_id");
    }
    // startconditions
    public function startconditions()
    {
        return $this->hasMany(StartCondition::class, "author_id");
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, "roles_users");
    }
    public function hasRole($role)
    {
        if (is_string($role)) {
            $role = Role::where("name", $role)->firstOrFail();
        }

        return $this->roles->contains($role);
    }
    public function profile()
    {
        return $this->hasOne(Profile::class, "user_id");
    }
    public function lang()
    {
        return $this->profile->lang;
    }
    //isAdmin
    public function isAdmin()
    {
        return $this->hasRole("admin");
    }
    // юзер
    public function isUser()
    {
        return $this->hasRole("user");
    }
    // isSuperUser
    public function isSuperUser()
    {
        return $this->hasRole("superuser");
    }
    // isCorpotateUser
    public function isCorpotateUser()
    {
        return $this->hasRole("corporateuser");
    }
}
