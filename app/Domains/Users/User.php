<?php
namespace ApiBase\Domains\Users;

use ApiBase\Support\Model\BaseModel;
use ApiBase\Support\Password\DefaultPassword;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class User extends BaseModel
{
    use SoftDeletes;

    protected $primaryKey = 'username';
    protected $collection = 'users';

    protected $fillable = [
        'name', 'username', 'password',
        'abilities', 'active', 'remember_token'
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = (string)(new DefaultPassword($value));
    }
}
