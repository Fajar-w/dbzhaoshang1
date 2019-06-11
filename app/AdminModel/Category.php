<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categorys';
    protected $fillable = ['term_id', 'name', 'slug', 'term_group','seo_title','seo_keys','seo_des','taxonomy','description','parent','count'];

    public $timestamps = false;

    // public function terms()
    // {
    //     return $this->hasOne('App\AdminModel\TermTaxonomy','term_id','term_id');
    // }

    // public function relationships()
    // {
    //     return $this->hasMany('App\AdminModel\TermRelationship','term_id','term_id');
    // }
  

}
