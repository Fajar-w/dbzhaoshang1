<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AdminModel\Area
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminModel\Area newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminModel\Area newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminModel\Area query()
 * @mixin \Eloquent
 */
class Area extends Model
{
    protected $fillable=[
      'id','parentid','regionname','type'
    ];
}
