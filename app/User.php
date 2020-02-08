<?php

namespace App;

use App\Task;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type'
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
/*
    public function tasks(){
        return $this->belongsToMany(Task::class);
    }
*/
    /**
     * Workfromhome has many Users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workfromhomes()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = workfromhome_id, localKey = id)
        return $this->hasMany(Workfromhome::class);
    }

    /**
     * User belongs to .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tasks()
    {
        return $this->belongsToMany(Task::class,'users_task');
    }
}
