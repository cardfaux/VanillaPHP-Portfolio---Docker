<?php require '../app/includes/header.php'; ?>

<main class="container mx-auto p-5">

  <!-- Hero Section with Background and Overlay -->
  <section class="relative bg-cover bg-center h-96" style="background-image: url('/assets/images/hero-background.jpg');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative text-center text-white py-32">
      <h2 class="text-5xl font-extrabold mb-5">Welcome to My Portfolio</h2>
      <p class="text-lg mb-10">Showcasing my latest work, blog posts, and more!</p>
      <a href="/blog" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition">
        Visit My Blog
      </a>
    </div>
  </section>

  <!-- Feature Section with Boxes -->
  <section class="py-20">
    <h2 class="text-3xl font-bold text-center mb-10">What I Do</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
      <!-- Feature Card 1 -->
      <div class="bg-white shadow-lg rounded-lg p-6 transition hover:shadow-xl">
        <div class="bg-blue-500 w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center">
          <i class="fas fa-code text-white text-2xl"></i>
        </div>
        <h3 class="text-xl font-bold">Web Development</h3>
        <p class="text-gray-600">I build responsive and scalable web applications using modern technologies.</p>
      </div>

      <!-- Feature Card 2 -->
      <div class="bg-white shadow-lg rounded-lg p-6 transition hover:shadow-xl">
        <div class="bg-green-500 w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center">
          <i class="fas fa-search text-white text-2xl"></i> <!-- Example icon -->
        </div>
        <h3 class="text-xl font-bold">SEO Optimization</h3>
        <p class="text-gray-600">Improving the visibility and ranking of websites with optimized SEO strategies.</p>
      </div>

      <!-- Feature Card 3 -->
      <div class="bg-white shadow-lg rounded-lg p-6 transition hover:shadow-xl">
        <div class="bg-red-500 w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center">
          <i class="fas fa-bug text-white text-2xl"></i> <!-- Example icon -->
        </div>
        <h3 class="text-xl font-bold">Bug Bounty</h3>
        <p class="text-gray-600">Participating in bug bounty programs to find vulnerabilities in web applications.</p>
      </div>
    </div>
  </section>

  <!-- Blog Preview Section with Cards -->
  <section class="py-20 bg-gray-50">
    <h2 class="text-3xl font-bold text-center mb-10">Latest Blog Posts</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
      <!-- Loop through your blog posts -->
      <?php foreach ($posts as $post): ?>
        <article class="bg-white shadow-lg rounded-lg p-6 transition hover:shadow-xl">
          <h3 class="text-xl font-bold mb-2">
            <a href="/posts/<?= htmlspecialchars($post['slug']) ?>" class="text-blue-500 hover:underline">
              <?= htmlspecialchars($post['title']) ?>
            </a>
          </h3>
          <p class="text-gray-600"><?= htmlspecialchars($post['description']) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-10">
      <a href="/blog" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition">
        View All Posts
      </a>
    </div>
  </section>

</main>

<?php require '../app/includes/footer.php'; ?>