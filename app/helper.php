<?php

use App\Model\Vod;
use App\Model\VodType;
use App\Service\VodService;
use Hyperf\Context\ApplicationContext;
use Hyperf\Database\Model\Collection;
use Hyperf\HttpServer\Contract\ResponseInterface;

use function Hyperf\Support\retry;

if (!function_exists("queryVods")) {
    function queryVods(array $parameters)
    {
        return (new VodService())->vods($parameters);
    }
}

if (!function_exists('response')) {
    function response():ResponseInterface
    {
        return  ApplicationContext::getContainer()->get(ResponseInterface::class);
    }
}
