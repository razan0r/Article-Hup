
<?php 
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}

if (isset($_GET['post_id'])) {
    include_once("admin/data/Post.php");
    include_once("db_conn.php");
    $id = $_GET['post_id'];
    $post = getById($conn, $id);
  

    if ($post == 0) {
        header("Location: blog.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - <?= htmlspecialchars($post['post_title']) ?></title>
    <!-- Bootstrap and Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <?php 
        include 'inc/NavBar.php';
    ?>

    <div class="container mt-5">
        <div class="row">
            <!-- Main Blog Content -->
            <div class="col-md-8">
                <main class="main-blog">
                    <div class="card main-blog-card mb-5">
                        <img src="upload/blog/<?=$post['cover_url']?>" class="card-img-top" alt="Post Cover">
                        <div class="card-body">
                            <h5 class="card-title"><?=$post['post_title']?></h5>
                            <p class="card-text"><?=$post['post_text']?></p>
                            <hr>
                            <div class="d-flex justify-content-between">
                             <small class="text-body-secondary">Posted on: <?= htmlspecialchars($post['created_at']) ?></small>
                            </div>
                        </div>
                    </div>


                </main>
            </div>
        </div>
    </div>
    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
<?php 
} else {
    header("Location: blog.php");
    exit;
} 
?>
