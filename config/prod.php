<?php
use Domain\PostRepo;

$app['posts'] = new PostRepo('http://programania.net'); // use your blog's url
