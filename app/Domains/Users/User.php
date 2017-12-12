<?php
namespace App\Domains\Users;

use App\Support\Model\BaseModel;
use App\Support\Password\DefaultPassword;
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

    protected $hidden = [
      'remember_token', 'password'
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = (string)(new DefaultPassword($value));
    }
}
