<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'remark', 'order', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function admins()
    {
        return $this->belongsToMany(Admin::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rules()
    {
        return $this->belongsToMany(Rule::class,'roleauths')->withTimestamps();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roleauths')->withTimestamps();
    }
    

    /**
     * 获取显示的权限
     * @return mixed
     */
    public function rulesPublic()
    {
        return $this->rules()->public()->orderBy('sort','asc')->get();
    }

}
