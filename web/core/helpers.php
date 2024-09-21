<?php

function dd($data)
{
  echo '<pre>';
  die(var_dump($data));
  echo '</pre>';
}

function redirect($uri)
{
  header('Location: ' . $uri);
}

function view($view, $data = [])
{
  extract($data);

  require "../app/views/{$view}.view.php";
}
