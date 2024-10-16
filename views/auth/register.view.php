<?php
	$dir = __DIR__ . "/";
	
	require($dir . "../partials/head.php");
?>
<?php
	require($dir . "../partials/nav.php");
?>
<form method="POST">
  <input name="email" placeholder="email" type="text"
		<?php if (isset($_POST["email"])): ?>
      value="<?= $_POST['email'] ?>"
		<?php endif; ?>
  />
	<?php if (isset($errors['email'])): ?>
    <p class="text-red-500 text-sm"><?= $errors['email'] ?></p>
	<?php endif; ?>
  <input name="password" placeholder="password" type="password"
		<?php if (isset($_POST["password"])): ?>
      value="<?= $_POST['password'] ?>"
		<?php endif; ?>

  />
	<?php if (isset($errors['password'])): ?>
    <p class="text-red-500 text-sm"><?= $errors['password'] ?></p>
	<?php endif; ?>
  <button type="submit">Register</button>
</form>
<?php
	require($dir . "../partials/footer.php");
?>
