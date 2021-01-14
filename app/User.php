<?php

namespace App;

use App\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;



class User extends Authenticatable
{
    use Notifiable, HasApiTokens;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'name', 'surname', 'cedula', 'email', 'celular', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verified_at',
        'created_at', 'updated_at'
    ];


    public static $rules = [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'cedula' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'celular' => 'required|string',
        ];


    public static function createUsuario(array $data)
    {

        return self::create([
            'role' => 'user',
            'name' => $data['name'],
            'surname' => $data['surname'],
            'cedula' => $data['cedula'],
            'email' => $data['email'],
            'celular' => $data['celular'],
            'password' => Hash::make($data['password']),

        ]);

        //$user->roles()->attach(Role::where('name', 'user')->first());

        //return $user;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

  public function prestamos() {
  return $this->hasMany('App\Prestamos');
  }

  public function asPrestamos() {
    return $this->hasMany(Prestamo::class, 'user_id')->orderBy('id', 'desc');
  }

  public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                 return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function sendFCM($message)
    {
        return fcm()->to([
              $this->device_token
          ])->notification([
              'title' => config('app.name'),
              'body' => $message
          ])->send();
    }

}
