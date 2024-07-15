<?php

namespace App\Service;

use App\Model\VodType;

class VodTypeService
{
    public function vodTypeChildren($parentId, $vodTypes)
    {
        $result = [];
        foreach ($vodTypes as $k => $v) {
            if ($v->parent_id == $parentId) {
                unset($vodTypes[$k]);
                $v->children=$this->vodTypeChildren($v->id,$vodTypes);
                $result[] = $v;
            }

        }
        return $result;
    }

    public function vodTypeTree()
    {
        $vodTypes = VodType::all();
        return $this->vodTypeChildren(0, $vodTypes);
    }
}
