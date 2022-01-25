<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class News extends Model
{
    use HasFactory;

    private const DIR = 'news/';

    protected $guarded = [];

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
