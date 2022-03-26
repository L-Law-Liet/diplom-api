<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DiscountStatus
 *
 * @property int $id
 * @property string $name
 * @property string $color
 * @property float $min
 * @property float $discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountStatus whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountStatus whereMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DiscountStatus extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'min' => 'float',
        'discount' => 'float',
    ];
}
