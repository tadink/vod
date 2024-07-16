<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Model;

use Hyperf\Database\Model\Relations\BelongsToMany;
use Hyperf\Database\Model\Relations\HasMany;

class Vod extends Model
{
    protected ?string $table = 'vod';

    public function play_urls(): HasMany
    {
        return $this->hasMany(PlayUrl::class, 'vod_id', 'id');
    }

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'actor_vod', 'vod_id', 'actor_id', 'id', 'id');
    }
}
