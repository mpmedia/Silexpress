<?php
/** @var $app Silex\Application */
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app->get('/', function () use ($app) {
  $posts = $app['posts']->firstPage();
  return $app['twig']->render('index.twig', array('posts' => $posts));
})->bind('homepage');

$app->get('/post/{slug}', function($slug) use ($app) {
  $post = $app['posts']->oneWithSlug($slug);
  return $app['twig']->render('post.twig', array('post' => $post));
})->bind('post');

$app->error(function (\Exception $e, $code) use ($app) {
  if ($app['debug'])
    return '';
  $page = 404 == $code ? '404.twig' : '500.twig';
  return new Response($app['twig']->render($page, array('code' => $code)), $code);
});