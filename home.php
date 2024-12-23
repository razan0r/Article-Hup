<?php 
// Check if the user is logged in
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}
?>

<!-- Main Banner Section -->
<div class="main-banner text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Welcome to ArticleHub</h1>
        <p class="lead mt-3">Your go-to platform for insightful articles across a wide range of topics. 
            Discover, learn, and engage with content crafted by passionate authors.
        </p>
        <a href="blog.php" class="btn btn-outline-light btn-lg mt-4 shadow-sm text-black">
            Explore Articles
        </a>
    </div>
</div>

<!-- Spacer -->
<div class="py-4"></div>

<!-- Call to Action Section -->
<div class="call-to-action-section container-fluid bg-light text-center py-5">
    <div class="container">
        <h2 class="display-5 fw-semibold">Join Our Community</h2>
        <p class="lead mt-3">Sign up today to share your thoughts and connect with other readers and authors!</p>
        <a href="login.php" class="btn btn-primary btn-lg mt-4 shadow">
            Get Started
        </a>
    </div>
</div>
