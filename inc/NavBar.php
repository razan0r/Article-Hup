<style>
  .navbar {
    background-color: #2c3e50; /* Modern dark background */
    padding: 1rem;
  }
  .navbar-brand {
    font-size: 1.8rem;
    font-weight: bold;
    color: #ffffff;
  }
  .navbar-brand span {
    color: #00bfff; /* Accent color for 'Hub' */
  }
  .nav-link {
    color: #ffffff;
    margin-right: 1rem;
    transition: color 0.3s ease;
  }
  .nav-link:hover,
.nav-link.active {
  color: #00bfff;
  font-weight: bold; 
}
  .nav-item.dropdown .dropdown-menu {
    background-color: #34495e;
    border: none;
    border-radius: 8px;
  }
  .dropdown-item {
    color: #ffffff;
    transition: background-color 0.3s ease;
  }
  .dropdown-item:hover {
    background-color: #00bfff;
    color: #ffffff;
  }
  .navbar-toggler {
    border-color: #ffffff;
  }
  .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=UTF8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%287255, 255, 255, 1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
  }
  .form-control {
    border-radius: 20px;
    border: 1px solid #00bfff;
  }
  .btn-outline-success {
    color: #00bfff;
    border-color: #00bfff;
    border-radius: 20px;
    transition: all 0.3s ease;
  }
  .btn-outline-success:hover {
    background-color: #00bfff;
    color: #ffffff;
  }
</style>

<?php 
    $logged = isset($_SESSION['username']); 
?>


<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="blog.php">
      <b>Article<span>Hub</span></b>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.php">Article</a>
        </li>
        <?php if ($logged) { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="profile.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             <!-- Display the profile photo beside the username -->
             <?php if (isset($_SESSION['profile_photo']) && $_SESSION['profile_photo'] != ""): ?>
              <img src="upload/blog/<?= $_SESSION['profile_photo'] ?>" alt="Profile Photo" class="rounded-circle" style="width: 30px; height: 30px; margin-right: 10px;">
            <?php else: ?>
              <!-- Default profile photo if none is set -->
              <img src="img/user-default.png" alt="Profile Photo" class="rounded-circle" style="width: 30px; height: 30px; margin-right: 10px;">
            <?php endif; ?>
            @<?=$_SESSION['username']?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login | Signup</a>
        </li>
        <?php } ?>
      </ul>
    
    </div>
  </div>
</nav>
