<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    private const DIR = '/users/';
    const PHONE_RULES = ['required', 'string', 'size:10', 'unique:users,phone'];
    const PASSWORD_RULES = ['required', 'string', 'min:8', 'max:255'];
    const NEW_PASSWORD_RULES = ['required', 'string', 'min:8', 'max:255', 'confirmed'];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'email_verified_at',
        'reset_code',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return BelongsToMany
     */
    public function cart_products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'carts');
    }

    /**
     * @return BelongsToMany
     */
    public function favourite_products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'favourites');
    }

    /**
     * @return HasMany
     */
    public function favourites(): HasMany
    {
        return $this->hasMany(Favourite::class);
    }

    /**
     * @return HasMany
     */
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return MorphOne
     */
    public function media(): MorphOne
    {
        return $this->morphOne(Media::class, 'media');
    }

    /**
     * @return string
     */
    public function getDirectory(): string
    {
        return self::DIR;
    }
}
