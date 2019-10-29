<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    
    protected $table='photos';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'path'
    ];


      /* many to many relatioship between photos and posts 
    the second argument is the name of the table link the two tables  */
    public function Posts(){
        return $this->belongsToMany('App\Model\Post','post_photos');
    }
}
