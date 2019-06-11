<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = ['object_id','term_id','slug'];

    public $timestamps = false;

    public function tagsprojects()
    {
        return $this->hasMany('App\AdminModel\Project','ID','object_id');
    }
  
}
