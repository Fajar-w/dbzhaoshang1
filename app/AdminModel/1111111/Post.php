<?php

namespace App\AdminModel;
use App\Scopes\StatusScope;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    protected $fillable = ['ID', 'post_author', 'post_date', 'post_date_gmt', 'post_content', 'post_title', 'post_excerpt', 'post_status', 'comment_status', 'ping_status', 'post_password', 'post_name', 'to_ping', 'post_modified', 'post_modified_gmt', 'post_content_filtered', 'post_parent', 'guid', 'menu_order', 'post_type', 'post_mime_type', 'comment_count','pterm_id','term_id','images','post_jstitle','views','status','seotitle','seokeys','pinged'];

    public $timestamps = false;

    public function categorys()
    {
        return $this->hasOne('App\AdminModel\Category','term_id','term_id');
    }
    public function postmeta()
    {
        return $this->hasOne('App\AdminModel\PostMeta','post_id','ID');
    }
    // public function relationships()
    // {
    //     return $this->hasMany('App\AdminModel\TermRelationship','object_id','ID');
    // }

	// public function objectids()
 //    {
 //        return $this->belongsToMany('App\AdminModel\TermRelationship','object_id','ID');
 //    }
    

    // function relationships()
    // {
    //     return $this->hasMany('App\AdminModel\TermRelationship','object_id','ID')->where('relationships.taxonomy', '=', 'post_tag');
    // }

  

}
