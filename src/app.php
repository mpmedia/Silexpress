<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;

date_default_timezone_set('Europe/Madrid');

$app = new Application();
$app->register(new UrlGeneratorServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new TwigServiceProvider(), array(
  'twig.path'    => array(__DIR__ . '/../templates'),
  'twig.options' => array('cache' => __DIR__ . '/../cache')
  //'twig.options' => array() // disable cache for dev
));
$app['twig'] = $app->share($app->extend('twig', function($twig, $app) {
  // add custom globals, filters, tags, ...

  return $twig;
}));

return $app;