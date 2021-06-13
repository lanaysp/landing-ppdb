<?php

namespace App;

use App\Pengguna\UserActivity;
use App\Ppdb\Ppdb;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


// You Can Add implements MustVerifyEmail For Lock Verify Email
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'role', 'employee_id', 'role', 'type_account', 'first_name',
        'middle_name', 'last_name', 'phone', 'image'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class)->withTrashed();
    }

    public function log()
    {
        return $this->hasMany(Log::class);
    }

    public function ppdb_registration()
    {
        return $this->hasMany(Ppdb::class, 'user_id');
    }

    public function riwayat_ppdb()
    {
        return $this->hasMany(UserActivity::class, 'user_id');
    }
}
