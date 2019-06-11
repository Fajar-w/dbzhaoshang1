<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
	protected $table = 'postmeta';
    protected $fillable = ['meta_id', 'post_id', 'meta_key', 'meta_value'];

    public $timestamps = false;

    // public function terms()
    // {
    //     return $this->hasOne('App\AdminModel\TermTaxonomy','term_id','term_id');
    // }

  

}
