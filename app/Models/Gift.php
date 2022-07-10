<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
  use HasFactory;

  public const Thanks = 1;

  public const GoodJob = 2;

  public const GoodPartner = 3;

  public const Amazing = 4;


  public function scopeFrom(Builder $builder, User $user): Builder {
    return $builder->where('user_id', $user->id);
  }

}
