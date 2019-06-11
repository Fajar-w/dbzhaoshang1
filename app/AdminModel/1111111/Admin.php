<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
/**
 * App\AdminModel\Admin
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminModel\Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminModel\Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminModel\Admin query()
 * @mixin \Eloquent
 */
class Admin extends Authenticatable
{
    use Notifiable;
    protected $cache_key = '_cache_rules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'name', 'email', 'password','status','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'adminroles')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function adminroles()
    {
        return $this->hasMany(AdminRole::class,'admin_id','id');
    }



  



}
