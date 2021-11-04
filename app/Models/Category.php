<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasSlug;
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'slug',
        'name',
    ];

    public function generateSlug(): string
    {
        return Str::slug(
            title: $this->name,
        );
    }
}
