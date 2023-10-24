<?php

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::creating(function (Model $item) {
//            $item->slug = $item->slug
//                ?? str($item->{self::slugFrom()})
//                    ->append(time())
//                    ->slug();
            $title = str($item->{self::slugFrom()});
            $item->slug = self::makeSlug($title);
        });
    }

    public static function slugFrom(): string
    {
        return 'title';
    }

    protected static function makeSlug($value): string
    {
        $slug = Str::slug($value);
        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }
}
