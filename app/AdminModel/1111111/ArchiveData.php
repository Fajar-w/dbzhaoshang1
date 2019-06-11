<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * App\AdminModel\Archive
 *
 * @mixin \Eloquent
 */
class ArchiveData extends Model
{
    protected $table = 'archivedatas';
    protected $fillable=[
        'id',
        'body'
    ];
    public $timestamps = false;

    
}
