<?php
	$dir = __DIR__ . "/"; // Tentukan direktori saat ini
	
	require($dir . "../partials/head.php");
?>
<?php
	require($dir . "../partials/nav.php");
?>
<?php require($dir . "../partials/heading.php"); ?>

<p>
  id: <?= htmlspecialchars($post['id']) ?>
</p>
<p>
  title: <?= htmlspecialchars($post['title']) ?>
</p>
<p>
  user_id: <?= htmlspecialchars($post['user_id']) ?>
</p>
<form method="POST">
  <input name="_method" type="hidden" value="DELETE" />
  <input name="id" type="hidden" value="<?= $post['id'] ?>" />
  <button>
    Delete
  </button>
</form>
<form method="POST">
  <input name="_method" type="hidden" value="PATCH" />
  <input name="id" type="hidden" value="<?= $post['id'] ?>" />
  <?php if(isset($errors['title'])) : ?>
    <p class="text-red-500 text-sm">
      <?= $errors['title']?>
    </p>
  <?php endif; ?>
  <input name="title" type="text" value="<?= $post['title'] ?>" />
  
  <input name="user_id" type="hidden" value="<?= $post['user_id'] ?> "  />
  <button type="submit">
    Submit
  </button>
</form>

<?php
	require($dir . "../partials/footer.php");
?>
