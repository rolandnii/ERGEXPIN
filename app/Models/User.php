<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\BroadcastsEvents;
use Ramsey\Uuid\Uuid;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids, SoftDeletes;

    /**
     * The trait BroadcastsEvents is used with you want to broadcast event on the model
     */
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_type',
        'email',
        'password',
    ];


    protected $attributes = [
        'user_type' => "normal"
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
     * Generate a new UUID for the model. and it is not ordered  by default is generated ordered
     */
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }


    /**
     * Get the prunable model query.
     */
    // public function prunable(): Builder
    // {
    //     return static::where('created_at', '<=', now()->subMonth());
    // }


    /**
     * This where you an an anonymouse global sccope in the booted method
     * the scope is to add general contraits
     * 
     */

    //   protected static function booted(): void
    //  {
    //      static::addGlobalScope('ancient', function (Builder $builder) {
    //          $builder->where('created_at', '<', now()->subYears(2000));
    //      });
    //  }
    // public function broadcastOn(string $event): array
    // {
    //     return [$this, $this->user];
    // }
}
