<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_image()
    {
        // return $this->avatar;
        if (Auth::user()->avatar != ''){
            return asset(Storage::url('avatar/'.Auth::user()->avatar));
        }
        return asset('img/user_default.png');
    }

    public function adminlte_desc()
    {
        $user = DB::table('model_has_roles')
                ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->where('model_has_roles.model_id', Auth::user()->id)
                ->select('name')
                ->first();
        return $user->name??'';
    }

    public function adminlte_profile_url()
    {
        return 'perfil';
    }

    public function setPasswordAttribute($password)
    {
        if ( $password !== null & $password !== "" )
        {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function myRol()
    {
        $rol = DB::table('model_has_roles')
                ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->where('model_has_roles.model_id', $this->id)
                ->select('roles.name')
                ->first();
        return $rol->name??'';
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    /**Relacions uno a muchos */
    public function post(){
        return $this->hasMany(Post::class);

    }
}
