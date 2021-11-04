<?php

declare(strict_types=1);

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self DRAFT()
 * @method static self PENDING()
 * @method static self PUBLISHED()
 * @method static self HIDDEN()
 */
class ArticleStatus extends Enum {}
