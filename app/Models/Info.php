<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Info
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|Info newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Info newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Info query()
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereValue($value)
 * @mixin \Eloquent
 * @property string|null $name
 * @property string|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereType($value)
 */
class Info extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
}
