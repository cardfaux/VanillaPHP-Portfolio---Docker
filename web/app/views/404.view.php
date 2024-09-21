<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title) ?></title>
  <link href="/assets/css/tailwind.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
  <div class="container text-center py-10">
    <h1 class="text-4xl font-bold text-gray-800"><?= htmlspecialchars($title) ?></h1>
    <p>The post you are looking for could not be found.</p>
  </div>
</body>

</html>