<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
	protected $table = 'adminroles';
    protected $fillable = ['admin_id', 'role_id'];
}
