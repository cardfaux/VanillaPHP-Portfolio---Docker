<?php

use Bramus\Router\Router;

$router = new Router();

$router->get('/', function () {
  // Pass any data to the view here, for example, a page title
  view('homepage', ['title' => 'Welcome to My Portfolio']);
});

$router->get('/posts/([a-zA-Z0-9-]+)', function ($slug) {
  $parsedown = new Parsedown();
  $filePath = "../app/posts/{$slug}.md";

  if (file_exists($filePath)) {
    $markdown = file_get_contents($filePath);
    $html = $parsedown->text($markdown);

    view('blog-post', ['content' => $html, 'title' => ucfirst(str_replace('-', ' ', $slug))]);
  } else {
    // Set headers before any output is sent
    header("HTTP/1.0 404 Not Found");
    view('404', ['title' => 'Post Not Found']);
  }
});

$router->run();
