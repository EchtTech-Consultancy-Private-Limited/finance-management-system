<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'mname',
        'lname',
        'email',
        'program_id',
        'institute_id',
        'password',
        'state_id',
        'district_id',
        'date',
        'user_type',
        'status',
        'dob',
        'gender',
        'ip',
        'user_agent',
        'last_login',
        'number',
        'mobile ',
        'landline',
        'login_status',
        'designation',
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
        'password' => 'hashed',
    ];
    
    /**
     * state
     *
     * @return void
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    
    /**
     * city
     *
     * @return void
     */
    public function city()
    {
        return $this->belongsTo(City::class,'district_id');
    }
    
    /**
     * program
     *
     * @return void
     */
    public function program()
    {
        return $this->belongsTo(InstituteProgram::class);
    }
    
    /**
     * institute
     *
     * @return void
     */
    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }
}
