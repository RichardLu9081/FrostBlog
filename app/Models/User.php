<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   
    protected $table = 'users'; // 替换成实际的表名

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
   
     /**
     * 判断用户是否为管理员
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        // 所有用户都被视为管理员
        return true;
    }
    
}
