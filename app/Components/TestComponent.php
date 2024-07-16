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

namespace App\Components;

use App\Model\Vod;
use Hyperf\Database\Model\Collection;
use Hyperf\DbConnection\Db;
use Hyperf\ViewEngine\Component\Component;

class TestComponent extends Component
{
    /**
     * @var Collection<Vod>
     */
    public Collection $vods;

    public function __construct()
    {
        $this->vods = Vod::query()->forPage(1, 15)->get();
        $vodTypes = Db::table('vod_type')->select(['id'])->where(['parent_id', '=', '1'])->get();
        $typeIds = $vodTypes->pluck('id')->toArray();
    }

    public function render(): mixed
    {
        return <<<'BLADE'
            @foreach($vods as $vod)
                {{$slot}}
            @endforeach
           
        
        BLADE;
    }
}
