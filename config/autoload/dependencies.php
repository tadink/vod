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

use App\Factory\BladeCompilerFactory;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\ViewEngine\Compiler\CompilerInterface;
use Hyperf\Contract\LengthAwarePaginatorInterface;

return [
    CompilerInterface::class => BladeCompilerFactory::class,
    StdoutLoggerInterface::class => App\Log\Log::class,
    LengthAwarePaginatorInterface::class => App\Paginator\LengthAwarePaginator::class,
];
