<?php

namespace App\Controller;


use App\Service\VodService;
use App\Service\VodTypeService;
use Hyperf\HttpMessage\Exception\NotFoundHttpException;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\ViewEngine\Contract\ViewInterface;
use Psr\Http\Message\ResponseInterface as MessageResponseInterface;
use function Hyperf\Config\config;

use function Hyperf\ViewEngine\view;

class VodController
{

    private VodService $vodService;
    private VodTypeService $vodTypeService;
    public function __construct(VodService $vodService, VodTypeService $vodTypeService)
    {
        $this->$vodService = $vodService;
        $this->vodTypeService = $vodTypeService;
    }

    public function index(RequestInterface $request): ViewInterface
    {
        $vodTypes = (new VodTypeService())->vodTypeTree();
        return view('index', ['types' => $vodTypes]);
    }

    public function typeVod(RequestInterface $request): ViewInterface
    {
        $filter = config('vod.filter');
        $typeId = (int)$request->route('type_id');
        $page = (int) $request->input('page', 1);
        $language = $request->input('language');
        $area = $request->input('area');
        $year = $request->input('year');
        $letter = $request->input('letter');
        $class = $request->input('class');


        $vodTypes = $this->vodTypeService->vodTypeTree();
        $currentType = $this->vodTypeService->vodTypeById($typeId, $vodTypes);
        $topType = $currentType->parent ?? $currentType;
        $queryVars = [
            'class' => $class,
            'language' => $language,
            'area' => $area,
            'year' => $year,
            'letter' => $letter
        ];
        $where = $this->parseVodWhere($typeId, $language, $area, $year, $letter, $class);
        $parameters = ['where' => $where, 'page' => $page, 'limit' => 50, 'with' => ['actors']];
        $paginate = $this->vodService->vodsPagination($parameters, $queryVars);
        return view('type', [
            'types' => $vodTypes,
            'paginate' => $paginate,
            'filter' => $filter,
            'currentType' => $currentType,
            'topType' => $topType,
            'queryVars' => $queryVars
        ]);
    }

    public function detail(RequestInterface $request): ViewInterface
    {
        $vodId = (int)$request->route('vod_id');
        $vodTypes = $this->vodTypeService->vodTypeTree();
        $vod = $this->vodService->vodDetail($vodId);
        if (!$vod) {
            throw new NotFoundHttpException("资源不存在");
        }
        $currentType = $vod->type;
        $topType = $currentType->parent ?? $currentType;
        $highScoreList = $this->vodService->highScoreVods($vod->type_id);
        return view('detail', [
            'types' => $vodTypes,
            'highScoreList' => $highScoreList,
            'vod' => $vod,
            'topType' => $topType,
            'currentType' => $currentType
        ]);
    }

    public function play(RequestInterface $request): MessageResponseInterface|ViewInterface
    {
        $vodId = (int) $request->route('vod_id');
        $urlId = (int) $request->route('url_id');
        if (! $vodId || ! $urlId) {
            return response()->redirect('/');
        }
        
        $vod = $this->vodService->vodDetail($vodId);
        if (! $vod) {
            return response()->redirect('/');
        }
        $currentType = $vod->type;
        $topType = $currentType->parent ?? $currentType;
        if ($vod->play_urls->isEmpty()) {
            return response()->redirect('/');
        }

        $currentUrl = $vod->play_urls->filter(function ($item) use ($urlId) {
            return $item->id === $urlId;
        })->first();
        if (empty($currentUrl)) {
            return response()->redirect('/');
        }
        $nextUrl = $vod->play_urls->filter(function ($item) use ($currentUrl) {
            return $item->index = $currentUrl->index + 1;
        })->first();
        $previousUrl = $vod->play_urls->filter(function ($item) use ($currentUrl) {
            return $item->index = $currentUrl->index - 1;
        })->first();
    
        $highScoreList = $this->vodService->highScoreVods($vod->type_id);
        return view('vodplay', [
            'vod' => $vod,
            'currentType' => $currentType,
            'topType' => $topType,
            'currentUrl' => $currentUrl,
            'types' => $this->vodTypeService->vodTypeTree(),
            'nextUrl' => $nextUrl,
            'previousUrl' => $previousUrl,
            'highScoreList'=>$highScoreList
        ]);
    }


    private function parseVodWhere($typeId, $language, $area, $year, $letter, $class): array
    {
        $where = ['type_id' => ['=', $typeId]];
        if ($language) {
            $where['language'] = ['=', $language];
        }
        if ($area) {
            $where['area'] = ['=', $area];
        }
        if ($year) {
            $where['year'] = ['=', $year];
        }
        if ($letter) {
            if ($letter == "1-9") {
                $where['letter'] = ['between', [1, 9]];
            } else {
                $where['letter'] = ['=', $letter];
            }
        }
        if ($class) {
            $where['classes'] = ['=', $class];
        }
        return $where;
    }
}
