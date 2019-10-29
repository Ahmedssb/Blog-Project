<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table='sections';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'name',
        'admin_id'
    ];


    public function Admin(){
        return $this->belongsTo('App\User','admin_id');
    }

    public function Posts(){
        return $this->hasMany('App\Model\Post');
    }
}
