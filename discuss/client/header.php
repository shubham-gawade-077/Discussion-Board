<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .bb{
    background-color: bisque !important;
}

  </style>
</head>
<body>
  

<nav class="navbar navbar-expand-lg navbar-light bg-light bb">
  <div class="container">
    <a class="navbar-brand" href="./">
      <img src="./public/logo.png" />
    </a>

    <div class="collapse navbar-collapse text-dark" id="navbarNav">
      <ul class="navbar-nav text-dark">
        <li class="nav-item">
          <a class="nav-link active text-dark" href="./">Home</a>
        </li>
        <?php
        if (isset($_SESSION['user']) && isset($_SESSION['user']['username'])) { ?>
          <li class="nav-item">
            <a class="nav-link text-dark"
              href="./server/requests.php?logout=true">Logout(<?php echo ucfirst($_SESSION['user']['username']) ?>)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="?ask=true">Ask A Question</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="?u-id=<?php echo $_SESSION['user']['user_id'] ?>">My Questions</a>
          </li>
        <?php }?>

        <?php
        if (!isset($_SESSION['user']) && !isset($_SESSION['user']['username'])) { ?>
          <li class="nav-item">
            <a class="nav-link text-dark" href="?login=true">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="?signup=true">SignUp</a>
          </li>
        <?php } ?>

        <li class="nav-item">
          <a class="nav-link text-dark" href="?latest=true">Latest Questions</a>
        </li>
      </ul>
    </div>
    <form class="d-flex" action="">
      <input class="form-control me-2" name="search" type="search" placeholder="Search questions">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
</body>
</html>