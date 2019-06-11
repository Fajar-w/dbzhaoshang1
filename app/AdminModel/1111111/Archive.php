<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * App\AdminModel\Archive
 *
 * @property-read \App\AdminModel\Arctype $arctype
 * @property-read \App\AdminModel\Arctype $arctype2
 * @property-read \App\AdminModel\Addonarticle $article
 * @property \Carbon时间格式 $published_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminModel\Archive newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminModel\Archive newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminModel\Archive published()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminModel\Archive query()
 * @mixin \Eloquent
 */
class Archive extends Model
{
    protected $fillable=[
        'id',
        'pid',
        'typeid',
        'brandid',
        'ismake',
        'click',
        'title',
        'shorttitle',
        'bdname',
        'flags',
        'tags',
        'country',
        'mid',
        'keywords',
        'description',
        'write',
        'litpic',
        'imagepics',
        'dutyadmin',
        'published_at',
        'created_at',
        'updated_at',
        'nid',
        'status',
        'editor'
    ];
    protected $dates = ['published_at'];

    /**
     * 文档获取后时间格式转换
     * @param date
     *
     * @return Carbon时间格式
     */
    public function getPublishedAtAttribute($date)
    {

        if (Carbon::now() > Carbon::parse($date)->addDays(10))
        {
           return date('Y-m-d',strtotime($date));
        }

        return Carbon::parse($date)->diffForHumans();
    }
    /**
     * 文档入库之前的时间格式转换
     * @param date
     *
     * @return
     */
    public function setPublishedAtAttribute($date)
    {
        /**if(!empty($date) && strpos($date, '/') !== false)
        {
            $newdate=explode('/',$date);
            $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d',$newdate[2].'-'.$newdate[0].'-'.$newdate[1]);
            $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d',$newdate[2].'-'.$newdate[0].'-'.$newdate[1]);
        }else{
            $this->attributes['published_at'] =$date?$date : Carbon::now();
            //$this->attributes['created_at'] =$date?Carbon::createFromFormat('Y-m-d',date('Y-m-d',strtotime($date))) : Carbon::now();
        }
         * */
        if(!empty($date) && strpos($date,':')==false)
        {
            $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d',$date);
        }else{
            $this->attributes['published_at'] =$date?$date : Carbon::now();
        }
    }

    public function scopePublished($query)
    {
        $query->where('published_at','<=',Carbon::now());
    }
    /**
     * Eloquent ORM 关联定义
     * @param
     *
     * @return arraydatas
     */

    public function arctype2()
    {
        return $this->belongsTo('App\AdminModel\Arctype','pid');
    }
    public function arctype()
    {
        return $this->belongsTo('App\AdminModel\Arctype','typeid');
    }
    
    public function article()
    {
        return $this->hasOne('App\AdminModel\Addonarticle','id');
    }
    public function dutyadmins()
    {
        return $this->belongsTo('App\AdminModel\Admin','dutyadmin');
    }
    protected function comments()
    {
        return $this->hasMany('App\AdminModel\Comments','id');
    }

    
}
