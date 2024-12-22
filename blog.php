<?php 
session_start();


$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Include the Navigation Bar -->
    <?php 
        include 'inc/NavBar.php'; 
        include_once("admin/data/Post.php"); 
        include_once("db_conn.php");

        // Fetch all blog posts
        $posts = getAll($conn);

    ?>
    
    <!-- Main content container -->
    <div class="container mt-5">
        <section class="d-flex">
            <!-- Main blog content -->
            <?php if ($posts != 0) { ?>
            <main class="main-blog">
                <h1 class="display-4 mb-4 fs-3">All Articles</h1>
                
                <!-- Loop through each post and display it -->
                <?php foreach ($posts as $post) { ?>
                <div class="card main-blog-card mb-5">
                  
                    <img src="upload/blog/<?=$post['cover_url']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                      
                        <h5 class="card-title"><?=$post['post_title']?></h5>
                        <?php 
                           
                            $p = strip_tags($post['post_text']); 
                            $p = substr($p, 0, 200);               
                        ?>
                       
                        <p class="card-text"><?=$p?>...</p>
                        <!-- Read more button -->
                        <a href="blog-view.php?post_id=<?=$post['post_id']?>" class="btn btn-primary">Read more</a>
                        <hr>
                        <!-- Post creation date -->
                        <small class="text-body-secondary"><?=$post['crated_at']?></small>
                    </div>
                </div>
                <?php } ?>
            </main>
            <?php } else { ?>
            <!-- Display a message if no posts are available -->
            <main class="main-blog p-2">
                <div class="alert alert-warning"> 
                    No posts yet.
                </div>
            </main>
            <?php } ?>

            <!-- Sidebar section with categories -->
            <aside class="aside-main">
                <div class="list-group category-aside">
                    <!-- Sidebar header -->
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        Category
                    </a>
                    <!-- Loop through each category and display it -->
                    <?php foreach ($categories as $category) { ?>
                    <a href="category.php?category_id=<?=$category['id']?>" class="list-group-item list-group-item-action">
                        <?= $category['category']; ?>
                    </a>
                    <?php } ?>
                </div>
            </aside>
        </section>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
