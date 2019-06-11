<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
	
    protected $fillable = ['object_id', 'term_taxonomy_id', 'term_order'];

    public $timestamps = false;

    // public function terms()
    // {
    //     return $this->hasOne('App\AdminModel\TermTaxonomy','term_id','term_id');
    // }

  

}
