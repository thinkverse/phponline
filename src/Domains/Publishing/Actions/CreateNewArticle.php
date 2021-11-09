<?php

declare(strict_types=1);

namespace Domains\Publishing\Actions;

use App\Enums\ArticleStatus;
use App\Models\Article;
use App\Models\User;
use Domains\Publishing\ValueObjects\ArticleValueObject;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class CreateNewArticle
{
    public static function handle(ArticleValueObject $object, Authenticatable|User $user): Model
    {
        $status = $user->verified
            ? ArticleStatus::PUBLISHED()
            : ArticleStatus::PENDING();

        return Article::query()->create(
            attributes: array_merge($object->toArray(), [
                'status' => $status->value,
                'user_id' => $user->id,
            ]),
        );
    }
}
