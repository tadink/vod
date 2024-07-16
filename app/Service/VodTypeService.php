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

namespace App\Service;

use App\Model\VodType;

class VodTypeService
{
    public function vodTypeChildren($parentId, $vodTypes): array
    {
        $result = [];
        foreach ($vodTypes as $k => $v) {
            if ($v->parent_id == $parentId) {
                unset($vodTypes[$k]);
                $v->children = $this->vodTypeChildren($v->id, $vodTypes);
                $result[] = $v;
            }
        }
        return $result;
    }

    public function vodTypeTree(): array
    {
        $vodTypes = VodType::all();
        return $this->vodTypeChildren(0, $vodTypes);
    }
}
