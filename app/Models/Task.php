<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Task extends Model
{
  use HasFactory;

  public const StatusDeactive = 0;

  public const StatusCreated = 1;

  public const StatusBacklog = 2;

  public const StatusOnProgress = 3;

  public const StatusInReview = 4;

  public const StatusDone = 5;


  protected $fillable = ['id'];

  protected $appends = [
    'createdDiffHumans'
  ];


  public static function booted() {

    static::saving(function ($model) {
      $model->slug = Str::of($model->title)->slug();
    });

  }


  public function getGetStatusStringAttribute(): string {
    switch ($this->status) {
      case Task::StatusInReview:
        return "Sedang ditanggapin oleh admin";
      case Task::StatusDone:
        return "Telah selesai";
      default:
        return "Sedang ditangani";
    }
  }

  public function getCreatedDiffHumansAttribute(): string
  {
    return $this->created_at->locale('id_ID')->isoFormat('LL');
  }

  public function getCreatedFullDiffHumansAttribute(): string
  {
    return $this->created_at->locale('id_ID')->isoFormat('LLLL');
  }

  public function scopeGreaterThan(Builder $builder, int $status): Builder
  {
    return $builder->where('status', '!=',  $status);
  }

  public function scopeStatusIn(Builder $builder, array $status): Builder
  {
    return $builder->whereIn('status', $status);
  }

  public function scopeFindSlug(Builder $builder, string $slug): Builder
  {
    return $builder->whereSlug($slug);
  }

  public function tags(): MorphToMany
  {
    return $this->morphToMany(Tag::class, 'model', 'taggables');
  }


  public function replies(): MorphToMany
  {
    return $this->morphToMany(Reply::class, 'model', 'replieables');
  }

  public function generateToken() {
    $this->token = Str::random(12);
  }

  public function getUsers(): BelongsToMany {
    return $this->belongsToMany(User::class)->using(Assignment::class);
  }

  public function user(): BelongsTo {
    return $this->belongsTo(User::class);
  }

  public function getAssignments(): BelongsToMany
  {
    return $this->belongsToMany(User::class, Assignment::TableName, 'task_id', 'user_id')
      ->using(Assignment::class)
      ->withPivot(['id', 'created_at', 'updated_at']);
  }

  public function assignment(): User
  {
    return $this->getAssignments()->first();
  }
}
