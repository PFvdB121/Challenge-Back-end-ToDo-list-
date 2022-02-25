<?php 
	session_start();
	if (empty($_SESSION['email'])) {
		header("Location: http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/login.php");
	}
	require 'connection.php';
	require 'function.php';
	$lists = getLists($_SESSION['id']);
	$title = "To Do";
	require "header.php";
?>
<p><?=$_SERVER['REQUEST_METHOD']?></p>
<p><?=$_SESSION['id']?></p>
		<div class="container" style="width: <?php echo ((count($test) + 1) * 220) . "px"?>;">
			<?php 
				foreach ($lists as $list)	 { 
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
			<span class="lists">
				<div id="newList" class="list-container">
					<button>+ Voeg een andere lijst toe</button>
				</div>
			</span>
		</div>
		<script type="text/javascript">
			var tasks = [
				<?php foreach ($lists as $list)	
					{
				?>

				<?php 
					}
				?>
			];
		</script>
		<script src="script.js"></script>
<?php 
	require "footer.php"
?>