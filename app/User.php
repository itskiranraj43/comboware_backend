<?php
namespace App;

use Hash;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use App\Notifications\AdminResetPassword as ResetPasswordNotificationToAdmin;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = ['name', 'email', 'password', 'remember_token'];
    
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }

    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($token));
    }

    public function sendPasswordResetNotificationToAdmin($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotificationToAdmin($token));
    }
    
    
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function getUserDataById($name)
    {
        dd($name);
    }
}
