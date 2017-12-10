<?php

use Zend\ServiceManager\AbstractFactory\ConfigAbstractFactory;
use Zend\ServiceManager\ServiceManager;


// Load configuration
$config = require 'config.php';

// Build container
$container = new ServiceManager($config['dependencies']);

// Inject config
$container->setService('config', $config);
// Abstract Factory
$container->addAbstractFactory(new ConfigAbstractFactory());

//Initialize everything Database Manager ( Laravel )
$container->get('database');

return $container;
