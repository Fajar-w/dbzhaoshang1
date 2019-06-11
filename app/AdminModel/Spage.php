<?php

namespace App\AdminModel;
use App\Scopes\StatusScope;

use Illuminate\Database\Eloquent\Model;


class Spage extends Model
{
    protected $fillable = ['ID', 'post_author', 'post_date', 'post_content', 'post_title', 'views','status','seotitle','seokeys','post_name','subtitle'];

    public $timestamps = false;
}
