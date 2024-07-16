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

namespace App\Exception\Handler;

use Hyperf\Context\ApplicationContext;
use Hyperf\Context\RequestContext;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Logger\LoggerFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Throwable;

class AppExceptionHandler extends ExceptionHandler
{
    protected LoggerInterface $logger;

    public function __construct()
    {
        $this->logger = ApplicationContext::getContainer()->get(LoggerFactory::class)->get('error', 'default');
    }

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $request = RequestContext::get();
        $uri = $request->getUri()->__toString();
        $this->logger->error(sprintf('%s[%s] in %s %s', $throwable->getMessage(), $throwable->getLine(), $throwable->getFile(), $uri));
        // $this->logger->error($throwable->getTraceAsString());

        return $response->withHeader('Server', 'Hyperf')->withStatus(500)->withBody(new SwooleStream('Internal Server Error.'));
    }

    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}
