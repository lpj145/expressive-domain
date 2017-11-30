<?php

use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

// Load configuration
$config = require __DIR__ . '/config.php';

// Build container
$container = new ServiceManager();
(new Config($config['dependencies']))->configureServiceManager($container);

// Inject config
$container->setService('config', $config);
// Abstract Factory
$container->addAbstractFactory(new \Zend\ServiceManager\AbstractFactory\ConfigAbstractFactory());
//Initialize Database Manager
$container->get(\Illuminate\Database\Capsule\Manager::class);

return $container;
