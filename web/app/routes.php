<?php

use Bramus\Router\Router;
use Spatie\YamlFrontMatter\YamlFrontMatter;

$router = new Router();

$router->get('/', function () {
  $postsDirectory = '../app/posts/';
  $files = array_diff(scandir($postsDirectory), ['..', '.']);

  // Get all Markdown files and prepare metadata
  $markdownFiles = array_filter($files, function ($file) {
    return pathinfo($file, PATHINFO_EXTENSION) === 'md';
  });

  $posts = array_map(function ($file) use ($postsDirectory) {
    $document = Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($postsDirectory . $file);
    $slug = pathinfo($file, PATHINFO_FILENAME);
    $title = $document->title ?? ucfirst(str_replace('-', ' ', $slug));
    $description = $document->description ?? '';
    return [
      'slug' => $slug,
      'title' => $title,
      'description' => $description,
    ];
  }, $markdownFiles);

  // Optionally sort posts by newest first
  usort($posts, function ($a, $b) {
    return strcmp($b['slug'], $a['slug']);
  });

  // Pass only the first 3 posts for the homepage
  $postsForHomePage = array_slice($posts, 0, 3);

  view('homepage', ['posts' => $postsForHomePage, 'title' => 'Welcome to My Portfolio']);
});

$router->get('/posts/([a-zA-Z0-9-]+)', function ($slug) {
  $filePath = "../app/posts/{$slug}.md";

  if (file_exists($filePath)) {
    $document = YamlFrontMatter::parseFile($filePath);
    $markdown = $document->body();
    $parsedown = new Parsedown();
    $html = $parsedown->text($markdown);

    $title = $document->title ?? ucfirst(str_replace('-', ' ', $slug));
    $description = $document->description ?? '';

    view('blog-post', ['content' => $html, 'title' => $title, 'description' => $description]);
  } else {
    header("HTTP/1.0 404 Not Found");
    view('404', ['title' => 'Post Not Found']);
  }
});

$router->get('/blog', function () {
  $postsDirectory = '../app/posts/';
  $files = array_diff(scandir($postsDirectory), ['..', '.']);

  // Filter only Markdown (.md) files
  $markdownFiles = array_filter($files, function ($file) {
    return pathinfo($file, PATHINFO_EXTENSION) === 'md';
  });

  // Prepare the list of posts with metadata
  $posts = array_map(function ($file) use ($postsDirectory) {
    $document = Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($postsDirectory . $file);
    $slug = pathinfo($file, PATHINFO_FILENAME);
    $title = $document->title ?? ucfirst(str_replace('-', ' ', $slug));
    $description = $document->description ?? '';
    return [
      'slug' => $slug,
      'title' => $title,
      'description' => $description,
    ];
  }, $markdownFiles);

  // Sort posts by newest first (optional)
  usort($posts, function ($a, $b) {
    return strcmp($b['slug'], $a['slug']);  // Sort by slug or add a date field in front matter
  });

  // Pagination setup
  $postsPerPage = 5;  // Number of posts per page
  $totalPosts = count($posts);  // Total number of posts
  $totalPages = ceil($totalPosts / $postsPerPage);  // Calculate total pages
  $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;  // Get current page from query string
  $offset = ($currentPage - 1) * $postsPerPage;  // Calculate offset

  // Slice the array to get the posts for the current page
  $postsForCurrentPage = array_slice($posts, $offset, $postsPerPage);

  // Pass the necessary variables to the view
  view('blog-list', [
    'posts' => $postsForCurrentPage,
    'title' => 'Blog',
    'totalPosts' => $totalPosts,  // Pass total number of posts
    'postsPerPage' => $postsPerPage,  // Pass postsPerPage for pagination logic
    'totalPages' => $totalPages,  // Pass total pages for pagination
    'currentPage' => $currentPage  // Pass the current page
  ]);
});

$router->run();
