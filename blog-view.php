<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog - Sample Post Title</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!-- Navigation Bar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">MyBlog</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="blog.php">Blog</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="category.php">Category</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container mt-5">
		<section class="d-flex">
			<!-- Main Blog Content -->
			<main class="main-blog">
				<div class="card main-blog-card mb-5">
					<img src="upload/blog/sample-image.jpg" class="card-img-top" alt="Sample Blog Image">
					<div class="card-body">
						<h5 class="card-title">Sample Post Title</h5>
						<p class="card-text">This is a sample blog post content. It includes information about the topic covered in the post.</p>
						<hr>
						<div class="d-flex justify-content-between">
							<div class="react-btns">
								<i class="fa fa-thumbs-up" aria-hidden="true"></i> Likes (<span>10</span>)
								<i class="fa fa-comment" aria-hidden="true"></i> Comments (<span>5</span>)
							</div>
							<small class="text-body-secondary">Posted on: 2024-12-22</small>
						</div>
						<hr>
						<h5 class="mt-4 text-secondary">Add Comment</h5>
						<form>
							<div class="mb-3">
								<input type="text" class="form-control" name="comment" placeholder="Write your comment here">
							</div>
							<button type="submit" class="btn btn-primary">Comment</button>
						</form>
						<hr>
						<!-- Comments Section -->
						<div class="comments">
							<div class="comment d-flex">
								<div>
									<img src="img/user-default.png" width="40" height="40">
								</div>
								<div class="p-2">
									<span>@sampleuser</span>
									<p>This is a sample comment.</p>
									<small class="text-body-secondary">2024-12-22</small>
								</div>
							</div>
							<hr>
						</div>
					</div>
				</div>
			</main>

			<!-- Sidebar -->
			<aside class="aside-main">
				<div class="list-group category-aside">
					<a href="#" class="list-group-item list-group-item-action active" aria-current="true">
						Category
					</a>
					<a href="category.php?category_id=1" class="list-group-item list-group-item-action">Category 1</a>
					<a href="category.php?category_id=2" class="list-group-item list-group-item-action">Category 2</a>
					<a href="category.php?category_id=3" class="list-group-item list-group-item-action">Category 3</a>
					<a href="category.php?category_id=4" class="list-group-item list-group-item-action">Category 4</a>
					<a href="category.php?category_id=5" class="list-group-item list-group-item-action">Category 5</a>
				</div>
			</aside>
		</section>
	</div>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".like-btn").click(function(){
				var liked = $(this).hasClass('liked');
				if (liked) {
					$(this).removeClass('liked');
				} else {
					$(this).addClass('liked');
				}
			});
		});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
