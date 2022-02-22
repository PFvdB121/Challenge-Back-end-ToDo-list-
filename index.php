<?php 
	require 'connection.php';
	require 'function.php';
	$test = getList();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>To Do</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/b36790a141.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="w3-blue w3-text-black bg">
		<div class="container" style="width: <?php echo ((count($test) + 1) * 220) . "px"?>;">
			<?php 
				for ($i=0; $i < count($test); $i++) { 
			?>
				<span class="lists">
					<div class="list-container">
						<ul>
							<?php 
								for ($i=0; $i < count(); $i++) { 
									// code...
								}
							?>
						</ul>
					</div>
				</span>
			<?php 
				}
			?>
		</div>
	</div>
	<script type="text/javascript">
		var descriptions = []
	</script>
	<script src="script.js"></script>
</body>
</html>