<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
class TermTaxonomy extends Model
{
	protected $table = 'term_taxonomy';
    protected $fillable = ['term_taxonomy_id', 'term_id', 'taxonomy', 'description', 'parent', 'count'];

    public $timestamps = false;

    public function termtaxonomy()
    {
        return $this->hasOne('App\AdminModel\Term','term_id','term_id');
    }

}
