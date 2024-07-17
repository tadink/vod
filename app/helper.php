<?php

declare(strict_types=1);

use App\Service\VodService;
use Hyperf\Collection\Arr;
use Hyperf\Context\ApplicationContext;
use Hyperf\Context\RequestContext;
use Hyperf\Database\Model\Collection;
use Hyperf\HttpMessage\Uri\Uri;
use Hyperf\HttpServer\Contract\ResponseInterface;

if (! function_exists('queryVods')) {
    function queryVods(array $parameters): array|Collection
    {
        return (new VodService())->vods($parameters);
    }
}

if (! function_exists('response')) {
    function response(): ResponseInterface
    {
        return ApplicationContext::getContainer()->get(ResponseInterface::class);
    }
}

if (!function_exists('makeUrl')) {
    function makeUrl(array $querys=[], ?string $url = null)
    {
        if ($url == null) {
            $request = RequestContext::get();
            $uri = new Uri($request->getUri()->__toString());
        } else {
            $uri =  new Uri($url);
        }
        $queryParams = Arr::query(array_merge($uri->getQueryParams(), $querys));
        return $uri->setQuery($queryParams)->toString();
    }
}
