<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['name'];
    protected $table = 'tasks';

    public function users(){
        return $this->belongsToMany(User::class,'users_task');
    }


}
