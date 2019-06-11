<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class RoleAuth extends Model
{

	
    protected $fillable = ['role_id','rule_id'];
}
