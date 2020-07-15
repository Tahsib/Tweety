<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','avatar', 'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline()
    {
       // return Tweet::where('user_id',$this->id)->latest()->get();
        $ids = $this->follows()->pluck('id');
        //$ids->push($this->id);

        return Tweet::whereIn('user_id',$ids)
            ->orWhere('user_id',$this->id)
            ->withLikes()
            ->latest()
            ->paginate(50);
    }

    public function getAvatarAttribute($value)
    {
        if(isset($value)){
            return asset('storage/'.$value );
        }
        else{
            return asset('/images/default.jpg');
        }

    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function path($append='')
    {
        $path = route('profile',$this->username);
        return $append ? "{$path}/{$append}" : $path;
    }
}
