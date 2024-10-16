<?php
	require_once basePath('utils/isActivePath.php');
?>
<header>
  <ul>
    <li><a class="<?php isActivePath("/") ?>" href="/">Home</a></li>
    <li>
      <a class="<?php isActivePath("/about") ?>" href="/about">About</a>
    </li>
    <li>
      <a class="<?php isActivePath("/contact") ?>" href="/contact">Contact</a>
    </li>
    <li>
      <a class="<?php isActivePath("/posts") ?>" href="/posts">Posts</a>
    </li>
   <?php if(!isset($_SESSION['user'])): ?>
     <li>
       <a class="<?php isActivePath("/register") ?>" href="/register">Register</a>
     </li>
     <li>
       <a class="<?php isActivePath("/login") ?>" href="/login">Login</a>
     </li>
   <?php endif; ?>
    <li>
	    <?php if (isset($_SESSION['user'] )):?>
        <p>
			    logged in
        </p>
        <form method="POST" action="/logout">
          <button type="submit">logout</button>
        </form>
	    <?php endif; ?>
    </li>
  </ul>
</header>