<?php

namespace App\Models;

use Attribute;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public const StatusDeactive = 0;

    public const StatusActive = 1;

    public const Staff = 'staff';

    public const Government = 'government';

    public const SuperAdmin = "superadmin";


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'employee_type',
        'employee_degree',
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

    public function getCurrentRoleAttribute(): Role {
      return $this->roles()->first();
    }


    public function tasks(): HasMany {
      return $this->hasMany(Task::class);
    }


    public function getGifts(): HasMany {
      return $this->hasMany(Gift::class);
    }


    public function assignments(): BelongsToMany {
      return $this->belongsToMany(Task::class, Assignment::TableName, 'user_id', 'task_id')->using(Assignment::class);
    }

}
