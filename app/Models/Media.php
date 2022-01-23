<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    use HasFactory;

    const MORPH_MODELS = [
        Product::class,
        News::class,
    ];

    protected $guarded = [];

    /**
     * @return MorphTo
     */
    public function media(): MorphTo
    {
        return $this->morphTo();
    }
}
