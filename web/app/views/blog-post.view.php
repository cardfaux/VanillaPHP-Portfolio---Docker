<?php require '../app/includes/header.php'; ?>

<main class="container mx-auto p-5">
  <h1 class="text-4xl font-bold mb-4"><?= htmlspecialchars($title) ?></h1>
  <p class="text-gray-600 mb-6"><?= htmlspecialchars($description) ?></p>

  <article class="prose max-w-none">
    <?= $content ?>
  </article>
</main>

<?php require '../app/includes/footer.php'; ?>