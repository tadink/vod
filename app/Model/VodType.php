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

class VodType extends Model
{
    protected ?string $table = 'vod_type';

    public function children()
    {
        return $this->hasMany(VodType::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(VodType::class, 'parent_id', 'id');
    }
}
