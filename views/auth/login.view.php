<?php
	$dir = __DIR__ . "/";
	
	require($dir . "../partials/head.php");
?>
<?php
	require($dir . "../partials/nav.php");
?>

<form method="POST">
  <input name="email" placeholder="email" type="text"
		<?php if (isset($email)): ?>
      value="<?= $email ?>"
		<?php endif; ?>
  />
	<?php if (isset($errors['email'])): ?>
    <p class="text-red-500 text-sm"><?= $errors['email'] ?></p>
	<?php endif; ?>
  <input name="password" placeholder="password" type="password"

  />
	<?php if (isset($errors['password'])): ?>
    <p class="text-red-500 text-sm"><?= $errors['password'] ?></p>
	<?php endif; ?>
  <button type="submit">Login</button>
</form>
<?php
	require($dir . "../partials/footer.php");
?>
