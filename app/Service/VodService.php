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

use App\Model\Vod;
use App\Model\VodType;
use Hyperf\Database\Model\Builder;

class VodService
{
    public function vods(array $parameters)
    {
        $query = $this->parseQuery($parameters);
        return $query->get();
    }

    public function vodsPagination(array $parameters)
    {
        $query = $this->parseQuery($parameters);
        $limit = $parameters['limit'] ?? 20;
        $page = $parameters['page'] ?? 1;
        /**
         * @var Hyperf\Paginator\LengthAwarePaginator $paginator
         */
        $paginator= $query->paginate($limit, ['*'], 'page', $page);

        return $paginator;
    }



    private function parseQuery($parameters): Builder
    {
        $query = Vod::query()->select($parameters['fields'] ?? ['*']);
        if (isset($parameters['with'])) {
            $query->with($parameters['with']);
        }
        foreach ($parameters['where'] ?? [] as $k => $v) {
            if ($k == 'type_id') {
                $vodIds = VodType::query()->whereIn('parent_id', (array) $v[1])->pluck('id');
                if ($vodIds->isEmpty()) {
                    $query->whereIn('type_id', (array) $v[1]);
                } else {
                    $vodIds = array_merge((array) $v[1], $vodIds->toArray());
                    $query->whereIn('type_id', $vodIds);
                }
                continue;
            }
            if (in_array($k, ['actors', 'directors', 'classes'])) {
                $query->whereHas($k, function (Builder $query)use($v) {
                    $query->where('name', $v[0], $v[1]);
                });
                continue;
            }

            if ($v[0] == 'in') {
                $boolean = ! empty($v[2]['or']) ? 'or' : 'and';
                $not = ! empty($v[2]['not']) ? true : false;
                $query->whereIn($k, $v[1], $boolean, $not);
                continue;
            }
            if ($v[0] == 'between') {
                $boolean = ! empty($v[2]['or']) ? 'or' : 'and';
                $not = ! empty($v[2]['not']) ? true : false;
                $query->whereBetween($v, $v[1], $boolean, $not);
                continue;
            }
            if ($v[0] === null) {
                $boolean = ! empty($v[1]['or']) ? 'or' : 'and';
                $not = ! empty($v[1]['not']) ? true : false;
                $query->whereNull($k, $boolean, $not);
                continue;
            }

            $boolean = ! empty($v[2]['or']) ? 'or' : 'and';
            $not = ! empty($v[2]['not']) ? true : false;
            $query->where($k, $v[0], $v[1], $boolean, $not);
        }
        foreach ($parameters['order'] ?? [] as $order) {
            $query->orderBy($order[0], $order[1]);
        }
        $limit = $parameters['limit'] ?? 10;
        $page = $parameters['page'] ?? 1;
        return $query->forPage($page, $limit);
    }


    public function vodDetail($vodId)
    {
        return Vod::query()->where("id", "=", $vodId)->with(['directors', 'actors', 'play_urls', 'type'])->first();
    }

    public function highScoreVods($typeId)
    {
        return Vod::query()
            ->with(['actors', 'directors', 'type'])
            ->where("type_id", "=", $typeId)
            ->orderByDesc("score")
            ->orderByDesc("vod_time")
            ->limit(15)
            ->get();
    }
}
