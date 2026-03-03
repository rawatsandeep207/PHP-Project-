<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isLoggedIn = isset($_SESSION['user']) && isset($_SESSION['user']['username']);
$username   = $isLoggedIn ? htmlspecialchars($_SESSION['user']['username']) : '';
$userId     = $isLoggedIn ? (int) $_SESSION['user']['user_id'] : 0;
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<a class="navbar-brand" href="./">
<img src="./public/discuss_logo.avif" width="60" height="40" alt="Discuss Logo">
</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
data-bs-target="#navbarNav">
<span class="navbar-toggler-icon"></span>
</button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <a class="nav-link <?= empty($_GET) ? 'active' : '' ?>" href="./">Home</a>
        </li>

        <?php if (!$isLoggedIn): ?>
          <li class="nav-item">
            <a class="nav-link" href="?signup=true">Signup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?login=true">Login</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <span class="nav-link">Hi, <?= $username ?></span>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="?ask=true">Ask A Question</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="?u-id=<?= $userId ?>">My Questions</a>
          </li>

          <li class="nav-item">
            <form method="POST" action="./server/requests.php" class="d-inline">
              <button type="submit" name="logout"
                      class="nav-link btn btn-link p-0">
                Logout
              </button>
            </form>
          </li>
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link" href="#">Category</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="?latest=true">Latest Questions</a>
        </li>

      </ul>
    </div>
  </div>
</nav>