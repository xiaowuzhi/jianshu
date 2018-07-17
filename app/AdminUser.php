<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;


class AdminUser extends Authenticatable {

    protected $rememberTokenName = '';
    protected $guarded = [];

    //用户有哪一些角色
    public function roles(){
        return $this->belongsToMany(\App\AdminRole::class, 'admin_user_role', 'user_id', 'role_id' )->withPivot(['user_id', 'role_id']);
    }

    //判断是否有某个橘色， 某些角色
    public function isInRoles($roles){
        return !!$roles->intersect($this->roles)->count();
    }


    //给用户分配角色
    public function assignRole($role){
        return $this->roles()->save($role);
    }

    //取消用户分配角色
    public function deleteRole($role){
        return $this->roles()->detach($role);
    }

    //是否有权限
    public function hasPermission($permission){
        return $this->isInRoles($permission->roles);
    }

}
