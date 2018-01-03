<?php

declare(strict_types=1);

use Zend\Mvc\Application;
use Zend\Stdlib\ArrayUtils;

// Delegate static file requests back to the PHP built-in webserver
if (PHP_SAPI === 'cli-server' && $_SERVER['SCRIPT_FILENAME'] !== __FILE__) {
    return false;
}
chdir(dirname(__DIR__));
require 'vendor/autoload.php';
/**
 * Self-called anonymous function that creates its own scope and keep the global namespace clean.
 */
(function () {
    /** @var \Psr\Container\ContainerInterface $container */
    $container = require 'config/container.php';
    /** @var Zend\Mvc\Application $app */
    $app = $container->get(Zend\Mvc\Application::class);
    $app->run();
})();
