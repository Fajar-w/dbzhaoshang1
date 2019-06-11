<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
class Info extends Model
{

    protected $fillable = ['url', 'typename', 'title', 'keyword', 'description', 'moban'];
    public $timestamps = false;
}
