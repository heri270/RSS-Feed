<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>RSS feed</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<div class="container">

		<div class="row">
			<h1>Planty blogs.html</h1>
		</div>

		<div class="row">
			
			<ul action="functions.php" method="GET">
				<li>
					name: <input type="text" name="title">
					<h2>$title</h2>
					<a href="#">Link</a>
					<p><small>Date</small></p>
					<p>Description</p>
				</li>
			</ul>
		</div>

	</div>
</body>
</html>