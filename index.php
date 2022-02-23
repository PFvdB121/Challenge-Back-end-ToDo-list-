<?php 
	if ($_SERVER["REQUEST_METHOD"] != "POST") {
		header("Location: http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/login.php");
	}
	require 'connection.php';
	require 'function.php';
	$test = getLists("test");
	$title = "To Do";
	require "header.php";
?>
		<div class="container" style="width: <?php echo ((count($test) + 1) * 220) . "px"?>;">
			<?php 
				for ($i=0; $i < count($test); $i++) { 
			?>
				<span class="lists">
					<div class="list-container">
						<ul>
							<?php 
								//for ($i=0; $i < count(); $i++) { 
									
								//}
							?>
						</ul>
					</div>
				</span>
			<?php 
				}
			?>
			<span id="newList">
				<button>+ Voeg een andere lijst toe</button>
			</span>
		</div>
		<script type="text/javascript">
			var descriptions = []
		</script>
		<script src="script.js"></script>
<?php 
	require "footer.php"
?>