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
    transition: background-color 0.3s ease, color 0.3s ease;
    padding: 5px 10px; /* Add padding for better visual alignment */
    border-radius: 5px; /* Rounded corners for hover and active states */
  }
  .nav-link:hover {
    color: #00bfff;
    background-color: rgba(0, 191, 255, 0.2); /* Slight highlight on hover */
  }
  .nav-link.active {
    background-color: #00bfff; /* Bright background for active state */
    color: #ffffff; /* Retain white text color */
    font-weight: bold; /* Bold font for emphasis */
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
$current_page = basename($_SERVER['PHP_SELF']); // Get the current page name
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
        <!-- Navigation Links -->
        <li class="nav-item">
          <a class="nav-link <?= $current_page == 'index.php' ? 'active' : '' ?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current_page == 'blog.php' ? 'active' : '' ?>" href="blog.php">Article</a>
        </li>

        <!-- Profile Dropdown for Logged-In Users -->
        <?php if ($logged): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php if (!empty($_SESSION['profile_photo'])): ?>
              <img src="upload/blog/<?= htmlspecialchars($_SESSION['profile_photo']) ?>" 
                   alt="Profile Photo" 
                   class="rounded-circle" 
                   style="width: 30px; height: 30px; margin-right: 10px;">
            <?php else: ?>
              <img src="img/user-default.png" 
                   alt="Default Profile Photo" 
                   class="rounded-circle" 
                   style="width: 30px; height: 30px; margin-right: 10px;">
            <?php endif; ?>
            @<?= htmlspecialchars($_SESSION['username']) ?>
            
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php else: ?>
        <!-- Login/Signup Link for Guests -->
        <li class="nav-item">
          <a class="nav-link <?= $current_page == 'login.php' ? 'active' : '' ?>" href="login.php">Login | Signup</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>