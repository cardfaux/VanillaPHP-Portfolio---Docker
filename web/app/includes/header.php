<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title) ?></title>
  <link href="/assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <?php if (getenv('VITE_ENV') === 'development'): ?>
    <script type="module" src="/src/main.js" defer></script>
  <?php else: ?>
    <script type="module" src="/assets/main.js" defer></script>
  <?php endif; ?>
</head>

<body class="bg-gray-100">
  <header class="text-center py-10">
    <h1 class="text-4xl font-bold text-gray-800"><?= htmlspecialchars($title) ?></h1>
    <nav class="mt-5">
      <a href="/" class="text-blue-500 hover:underline mx-3">Home</a>
      <a href="/blog" class="text-blue-500 hover:underline mx-3">Blog</a> <!-- Blog link -->
    </nav>
  </header>