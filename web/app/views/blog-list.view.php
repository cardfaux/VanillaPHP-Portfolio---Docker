<?php require '../app/includes/header.php'; ?>

<main class="container mx-auto p-5">
  <h2 class="text-3xl font-bold mb-5">Blog Posts</h2>

  <ul>
    <?php foreach ($posts as $post): ?>
      <li class="mb-5">
        <a href="/posts/<?= htmlspecialchars($post['slug']) ?>" class="text-blue-500 hover:underline text-2xl font-bold">
          <?= htmlspecialchars($post['title']) ?>
        </a>
        <p class="text-gray-600"><?= htmlspecialchars($post['description']) ?></p>
      </li>
    <?php endforeach; ?>
  </ul>

  <!-- Only show pagination if there are more posts than postsPerPage -->
  <?php if ($totalPosts > $postsPerPage): ?>
    <div class="mt-6">
      <?php if ($currentPage > 1): ?>
        <a href="/blog?page=<?= $currentPage - 1 ?>" class="text-blue-500 hover:underline">Previous</a>
      <?php endif; ?>

      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="/blog?page=<?= $i ?>" class="text-blue-500 hover:underline <?= ($i == $currentPage) ? 'font-bold' : '' ?>">
          <?= $i ?>
        </a>
      <?php endfor; ?>

      <?php if ($currentPage < $totalPages): ?>
        <a href="/blog?page=<?= $currentPage + 1 ?>" class="text-blue-500 hover:underline">Next</a>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</main>

<?php require '../app/includes/footer.php'; ?>