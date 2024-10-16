<?php
	$dir = __DIR__ . "/"; // Tambahkan "/" di akhir path untuk memastikan penggabungan yang benar
	require($dir . "../partials/head.php");
?>
<?php
	require($dir . "../partials/nav.php");
?>
<?php require($dir . "../partials/heading.php"); ?>

<form method="post" >
  <input name="title" placeholder="Title" type="text"
		<?php if (isset($title)): ?>
         value="<?= htmlspecialchars($title) ?>" <!-- Untuk mencegah HTML injection -->
	<?php endif; ?>
	<?php if (isset($errors['title'])) : ?>
    <p class="text-red-500 text-sm"><?= htmlspecialchars($errors['title']) ?></p>
	<?php endif; ?>

  <button type="submit">Submit</button>
</form>

<?php
	require($dir . "../partials/footer.php");
?>
