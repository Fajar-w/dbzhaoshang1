<?php

namespace App\AdminModel;
use App\Scopes\StatusScope;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{
	protected $table = 'news';
    protected $fillable = ['ID', 'post_author', 'post_date', 'post_content', 'post_title', 'post_name', 'post_modified',  'guid', 'menu_order', 'comment_count','pterm_id','term_id','images','post_jstitle','views','status','seotitle','seokeys','subtitle'];

    public $timestamps = false;

    public function categorys()
    {
        return $this->hasOne('App\AdminModel\Category','term_id','term_id');
    }


}
