<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DiscountCard
 *
 * @property int $id
 * @property int $discount_status_id
 * @property int $user_id
 * @property string $expires
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCard query()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCard whereDiscountStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCard whereExpires($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCard whereUserId($value)
 * @mixin \Eloquent
 */
class DiscountCard extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
}
