<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AdminModel\Arctype
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminModel\Arctype newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminModel\Arctype newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminModel\Arctype query()
 * @mixin \Eloquent
 */
class Arctype extends Model
{
    //
    protected $fillable = [
        'reid',
        'topid',
        'sortrank',
        'typename',
        'typedir',
        'title',
        'description',
        'keywords',
        'isextend',
        'is_write',
        'litpic',
        'contents',
        'dirposition',
        'real_path',
        'ishidden',
        'mid',
        'typeimages',
    ];
    public function setFillable($fillable)
    {
        $this->fillable = $fillable;
    }
    /**
     * Eloquent ORM 关联定义
     * @param
     *
     * @return arraydatas
     */
    protected function articles()
    {
        return $this->hasMany('App\AdminModel\Archive','typeid');
    }
    protected function addonarticle()
    {
        return $this->hasMany('App\AdminModel\Addonarticle','typeid');
    }
    protected function brandarticle()
    {
        return $this->hasMany('App\AdminModel\Brandarticle','typeid');
    }
    protected function productionarticle()
    {
        return $this->hasMany('App\AdminModel\Production','typeid');
    }
}
