<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
class ApUpYunImg extends Model
{
	protected $table = 'ap_upyun_img';
    protected $fillable = ['id', 'upyun_key', 'local_key', 'in_local', 'date_time'];

    public $timestamps = false;

    // public function termtaxonomy()
    // {
    //     return $this->hasOne('App\AdminModel\Term','term_id','term_id');
    // }

}
