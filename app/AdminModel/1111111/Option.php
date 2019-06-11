<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
class Option extends Model
{

    protected $fillable = ['option_id', 'option_name', 'option_value', 'autoload '];

    public $timestamps = false;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */



}
