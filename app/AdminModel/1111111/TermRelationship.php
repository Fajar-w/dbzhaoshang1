<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class TermRelationship extends Model
{
	protected $table = 'term_relationships';
    protected $fillable = ['object_id', 'term_taxonomy_id', 'term_order','taxonomy','parent','term_id'];

    public $timestamps = false;

    public function termrelationships()
    {
        return $this->hasMany('App\AdminModel\Term','term_id','term_id');
    }
  

}
