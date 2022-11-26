<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'family',
        'email',
        'unique_id',
        'passport_code',
        'status',
        'password',
        'phone',
        'isAdmin',
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

    public function children()
    {
        return $this->hasMany(Child::class);
    }

    public function avatar()
    {
        if ($this->isAdmin == 1){
            return asset('assets/media/avatars/admin.png');
        }else{
            if( $this->student()->count() ){
                return asset('assets/media/avatars/images.jpg');
            }
            else{
                return asset('assets/media/avatars/driver.jpg');
            }
        }
    }


    public  function scopeLike($query, $arrayField, $value)
    {
        foreach ($arrayField as $key => $fild) {
            if ($key == 0)
                $query->where($fild, 'LIKE', "%$value%");
            else
                $query->orWhere($fild, 'LIKE', "%$value%");
        }
        return $query;
    }
}
