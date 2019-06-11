<?php

namespace App\AdminModel;
use Illuminate\Database\Eloquent\Model;

class Pnew extends Model
{

    protected $fillable = ['id', 'post_author', 'post_date', 'post_content', 'post_title', 'post_modified','pterm_id','term_id','images','post_jstitle','views','status','seotitle','seokeys','pid'];

    public $timestamps = false;

    public function projects()
    {
        return $this->hasOne('App\AdminModel\Project','ID','pid');
    }


}
