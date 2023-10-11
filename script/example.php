<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

/** @var ContainerInterface  $container */
$container = require 'config/container.php';

final class Example
{
    
    /**
     * @var Service
     */
    protected Service $service;
    
    /**
     * @param ContainerInterface $container
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->service = $container->get(Service::class);
    }
    
    /**
     *
     * @return void
     * @throws Exception
     */
    public function __invoke(): void
    {
        
        try {
            // All processing logic
        } catch (Throwable $e) {
            // logger
        } finally {
            $this->logger->info('Finally processing');
        }
        
    }
    
}

(new Example($container))();
