

<?php 
// Check if the user is logged in
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}
?>

<!-- Main Banner Section -->
<div class="main-banner text-center   py-5">
    <h1>Welcome to ArticleHub</h1>
    <p class="lead">Your go-to platform for insightful articles across a wide range of topics. Discover, learn, and engage with content crafted by passionate authors.</p>
    <a href="blog.php" class="btn btn-primary btn-lg">Explore Articles</a>
</div>


<!-- Call to Action Section -->
<div class="container-fluid   text-center py-5 mt-5">
    <h2>Join Our Community</h2>
    <p class="lead">Sign up today to share your thoughts and connect with other readers and authors!</p>
    <a href="login.php" class="btn btn-light btn-lg">Get Started</a>
</div>
