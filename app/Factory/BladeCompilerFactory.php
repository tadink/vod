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

namespace App\Factory;

use Hyperf\Di\Container;
use Hyperf\Support\Filesystem\Filesystem;
use Hyperf\ViewEngine\Blade;
use Hyperf\ViewEngine\Compiler\BladeCompiler;

class BladeCompilerFactory
{
    public function __invoke(Container $container)
    {
        $blade = new BladeCompiler(
            $container->get(Filesystem::class),
            Blade::config('config.cache_path')
        );
        $blade->directive('vod_list', function ($expression) {
            return sprintf(<<<'PHP'
               <?php 
                 $vods=\queryVods(%s); 
                 foreach($vods as $i=>$vod):?>
            PHP, $expression);
        });
        $blade->directive('end_vod_list', function ($expression) {
            return '<?php endforeach;?>';
        });

        // register view components
        foreach ((array) Blade::config('components', []) as $alias => $class) {
            $blade->component($class, $alias);
        }

        $blade->setComponentAutoload((array) Blade::config('autoload', ['classes' => [], 'components' => []]));

        return $blade;
    }
}
