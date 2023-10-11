<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ArrayProvider;
use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;

$cacheConfig = ['config_cache_path' => 'data/cache/config-cache.php'];
$aggregator = new ConfigAggregator([
    new ArrayProvider($cacheConfig),
    // All your modules
    Coderun\Common\ConfigProvider::class,
   // Coderun\Module3\ConfigProvider::class,
   // Coderun\Module4\ConfigProvider::class,
    new PhpFileProvider(realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php'),
],$cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();
