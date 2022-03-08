<?php 
	include_once 'function.php';
	session_start();
	if (empty($_SESSION['email'])) {
		header("Location: http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/login.php");
	}
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if ($_POST['action'] == "addList") {
			insertList($_SESSION["id"], $_POST['name']);
		}
		elseif ($_POST["action"] == "updateList") {
			updateList($_POST['name'], $_POST['id']);
			$_SESSION[strval($_POST['id'])]["filter"] = $_POST["filter"];
			$_SESSION[strval($_POST['id'])]["order"] = $_POST["order"];
		}
		elseif ($_POST["action"] == "deleteList"){
			deleteList($_POST['id']);
		}
		elseif ($_POST["action"] == "addTask"){
			insertTask($_POST["name"], $_POST["id"]);
		}
		header("Location: " . test_input($_SERVER['PHP_SELF']));
	}
	$listCount = 0;
	$taskCount;
	$lists = getLists($_SESSION['id']);
	$title = "To Do";
	require "header.php";
?>
		<div style="width: <?php echo ((count($lists) + 1) * 220) . "px"?>;" id="container">
			<?php 
				for ($i=0; $i < count($lists); $i++) { 
					if ($_SESSION[strval($lists[$i]['id'])]["order"] == $_POST["order"]) {
						// code...
					}
					if ($_SESSION[strval($lists[$i]['id'])]["order"] == $_POST["order"]) {
						// code...
					}
					$tasks = listParts($lists[$i]["id"]);
			?>
				<span class="list-container w3-grey inlineBlock">
					<form action="<?=test_input($_SERVER['PHP_SELF'])?>" method="post" class="form">
						<input type="text" name="name" value="<?=$lists[$i]['name']?>" class="form w3-grey bold">
						<input type="hidden" name="id" value="<?=$lists[$i]['id']?>">
						<input type="hidden" name="action" value="updateList">
						<label for="filter<?=$lists[$i]['id']?>">Filter bij status</label>
						<select class="w100" name="filter" id="filter<?=$lists[$i]['id']?>">
							<option value="niet">niet</option>
							<option value="goed">goed</option>
							<option value="twijfelachtig">twijfelachtig</option>
							<option value="onvoldoende">onvoldoende</option>
						</select>
						<label for="order<?=$lists[$i]['id']?>">verdeel in minuten</label>
						<select class="w100" name="order" id="order<?=$lists[$i]['id']?>">
							<option value="niet">niet</option>
							<option value="ASC">van klein naar groot</option>
							<option value="DESC">van groot naar klein</option>
						</select>
						<input type="submit" value="update">
					</form>
					<button class="w3-red" onclick="deleteList(<?=$lists[$i]['id']?>, `<?=$lists[$i]['name']?>`)">
						delete lijst
					</button>
					<h3>taken</h3>
					<ul class="w3-indigo">
						<?php 
							//for ($x=0; $x < count(); $x++) { 
								
							//}
						?>
						<li class="addingTask"><button class="addTaskB" onclick="addTask(<?=$lists[$i]["id"]?>, <?=$i?>)">Een taak toevoegen+</button></li>
					</ul>
				</span>
			<?php 
				}
			?>
			<span class="lists inlineBlock" id="addList">
				<span id="newList" class="list-container inlineBlock">
					<button onclick="addingList()" class="inlineBlock">+ Voeg lijst toe</button>
				</span>
			</span>
		</div>
		<script type="text/javascript">
			var tasks = [
				<?php 
					foreach ($lists as $list) {
					$tasks = listParts($list["id"]);
					$listCount++;
				?>
				[
					<?php 
						foreach ($tasks as $key => $value) {
					?>

					<?php 
						}
					?>
				]
				<?php 
					if ($listCount < count($lists)) {
				?>
				,
				<?php 
					}
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