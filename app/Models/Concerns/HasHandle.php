<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;

trait HasHandle
{
    public static function bootHasHandle(): void
    {
        static::creating(fn (Model $model) => $model->handle = $model->generateHandle());
    }
}
