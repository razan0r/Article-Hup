<?php 
// Check if the user is logged in
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}
?>

<!-- Main Banner Section -->
<div class="main-banner text-center bg-dark text-white py-5">
    <h1>Welcome to ArticleHub</h1>
    <p class="lead">Your go-to platform for insightful articles across a wide range of topics. Discover, learn, and engage with content crafted by passionate authors.</p>
    <a href="blog.php" class="btn btn-primary btn-lg">Explore Articles</a>
</div>

<!-- About Section -->
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2>About ArticleHub</h2>
            <p>
                ArticleHub is your one-stop destination for discovering insightful and engaging articles across a variety of topics. Whether you're interested in technology, health, education, or entertainment, we've got you covered. Join our growing community and start exploring content tailored to your interests.
            </p>
            <a href="about.php" class="btn btn-outline-primary">Learn More</a>
        </div>
    </div>
</div>

<!-- Call to Action Section -->
<div class="container-fluid bg-primary text-white text-center py-5 mt-5">
    <h2>Join Our Community</h2>
    <p class="lead">Sign up today to share your thoughts and connect with other readers and authors!</p>
    <a href="login.php" class="btn btn-light btn-lg">Get Started</a>
</div>
