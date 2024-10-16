<?php
	$dir = __DIR__ . "/";
	require($dir . "../partials/head.php");
?>
<?php
	require($dir . "../partials/nav.php");
?>
<?php require($dir . "../partials/heading.php"); ?>

<a class="hover:text-blue-500" href="/posts/create">
  Create Post
</a>
<ul>
	<?php foreach ($posts as $post): ?>
    <li>
      <a class="hover:text-blue-500" href="/post?id=<?= $post['id'] ?>">
				<?= htmlspecialchars($post['title']) ?>
      </a>
    </li>
	<?php endforeach; ?>
</ul>

<?php
	require($dir . "../partials/footer.php");
?>
