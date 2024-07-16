<?php

declare(strict_types=1);

use App\Service\VodService;
use Hyperf\Context\ApplicationContext;
use Hyperf\Database\Model\Collection;
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
