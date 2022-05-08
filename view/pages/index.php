<?php 
	define('BASE_URL', $_SERVER['SERVER_NAME'] . "/.." . "/.." . "/.." . "/");
	
	include BASE_URL . 'controller/insertList/insertList.php';
	
	include BASE_URL . 'controller/updateList/updateList.php';
	
	include BASE_URL . 'controller/deleteList/deleteList.php';
	
	include BASE_URL . 'controller/insertTask/insertTask.php';
	
	include_once BASE_URL . 'controller/getTask/getTask.php';
	
	include_once BASE_URL . 'controller/getList/getList.php';
	
	include_once BASE_URL . 'controller/getUserById/getUserById.php';
	
	include BASE_URL . 'controller/getLists/getLists.php';
	
	include BASE_URL . 'controller/listParts/listParts.php';
	
	include BASE_URL . 'controller/listPartsF/listPartsF.php';
	
	include BASE_URL . 'controller/listPartsFO/listPartsFO.php';
	
	include BASE_URL . 'controller/listPartsO/listPartsO.php';
	
	include BASE_URL . 'controller/deleteTaskList/deleteTaskList.php';
	
	session_start();
	if (empty($_SESSION['email'])) {
		header("Location: http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/view/login/login.php");
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if ($_POST['action'] == "addList") {
			insertList($_SESSION["id"], $_POST['name']);
		}
		elseif ($_POST["action"] == "updateList") {
			updateList($_POST['name'], $_POST['id']);
			$_SESSION[strval($_POST['id']) . "ID"] = array("filter" => $_POST["filter"], "order" => $_POST["order"]);
		}
		elseif ($_POST["action"] == "deleteList"){
			deleteTaskList($_POST['id']);
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

	require "../pageParts/header.php";

?>
		<?php 

			if (isset($_GET['taskId'])) {

				if (is_numeric($_GET['taskId'])) {

					$selTask = getTask($_GET['taskId']);

					$list = getList($selTask["listID"]);

					$user = getUserById($list["user"]);

					if ($user["id"] == $_SESSION['id']) {
		?>
		<div class="z3 bg">

			<div class="taskContainer w3-white">

				<a href="http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/view/pages/index.php" class="buttonLink rightTop w3-grey"><i class="fa fa-close"></i></a>

				<form action="http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/controller/updatedTask/updatedTask.php" method="POST">

					<input type="hidden" name="id" value="<?=$selTask['id']?>">

					<input type="text" name="task" value="<?=$selTask['task']?>" class="bold">

					<div>

						<label for="statusTask" class="block">status taak</label>

						<select name="status" id="statusTask">
							<option value="nog bezig"
							<?php 

							if ($selTask['status'] == "nog bezig") {

							?>

							selected

							<?php 

							}

							?>
							>nog bezig</option>



							<option value="afgemaakt"

							<?php 

							if ($selTask['status'] == "afgemaakt") {

							?>

							selected

							<?php 

							}

							?>

							>afgemaakt</option>

						</select>

					</div>

					<div>
						<label for="durationTask" class="block">Nodige hoeveelheid minuten</label>
						<input type="number" name="duration" id="durationTask" value="<?=$selTask['duration']?>" min="0">
					</div>

					<div>
						<label for="taskDescription" class="block">beschrijving</label>
						<textarea name="description" id="taskDescription" rows="20" cols="80"><?=$selTask['description']?></textarea>
					</div>

					<input type="submit" value="update">

				</form>

			</div>

		</div>

		<?php 
					}
				}
			}
		?>

		<div style="width: <?php echo ((count($lists) + 1) * 220) . "px"?>;" id="container">

			<?php 

				for ($i=0; $i < count($lists); $i++) { 

					if (isset($_SESSION[strval($lists[$i]["id"]) . "ID"]["filter"]) && isset($_SESSION[strval($lists[$i]["id"]) . "ID"]["order"]) && !empty($_SESSION[strval($lists[$i]["id"]) . "ID"]["filter"]) && !empty($_SESSION[strval($lists[$i]["id"]) . "ID"]["order"]) && $_SESSION[strval($lists[$i]["id"]) . "ID"]["filter"] != "" && $_SESSION[strval($lists[$i]["id"]) . "ID"]["order"] != "") {
						$tasks = listPartsFO($lists[$i]["id"], $_SESSION[strval($lists[$i]["id"]) . "ID"]["filter"], $_SESSION[strval($lists[$i]["id"]) . "ID"]["order"]);

					}

					elseif (isset($_SESSION[strval($lists[$i]["id"]) . "ID"]["filter"]) && !empty($_SESSION[strval($lists[$i]["id"]) . "ID"]["filter"]) && $_SESSION[strval($lists[$i]["id"]) . "ID"]["filter"] != "") {
						$tasks = listPartsF($lists[$i]["id"], $_SESSION[strval($lists[$i]["id"]) . "ID"]["filter"]);
					}

					elseif (isset($_SESSION[strval($lists[$i]["id"]) . "ID"]["order"]) && !empty($_SESSION[strval($lists[$i]["id"]) . "ID"]["order"]) && $_SESSION[strval($lists[$i]["id"]) . "ID"]["order"] != "") {
						$tasks = listPartsO($lists[$i]["id"], $_SESSION[strval($lists[$i]["id"]) . "ID"]["order"]);
					}

					else{
						$tasks = listParts($lists[$i]["id"]);
					}
					
			?>
				<span class="list-container w3-grey inlineBlock VATop">

					<form action="<?=test_input($_SERVER['PHP_SELF'])?>" method="post" class="form">

						<input type="text" name="name" value="<?=$lists[$i]['name']?>" class="form w3-grey bold">

						<input type="hidden" name="id" value="<?=$lists[$i]['id']?>">

						<input type="hidden" name="action" value="updateList">

						<label for="filter<?=$lists[$i]['id']?>">Filter bij status</label>

						<select class="w100" name="filter" id="filter<?=$lists[$i]['id']?>">

							<option value="">niet</option>

							<option value="nog bezig"

								<?php 
									if ($_SESSION[strval($lists[$i]["id"]) . "ID"]["filter"] == "nog bezig") {
								?>

									selected

								<?php 
									}
								?>

							>nog bezig</option>

							<option value="afgemaakt"

								<?php 

									if ($_SESSION[strval($lists[$i]["id"]) . "ID"]["filter"] == "afgemaakt") {

								?>

									selected

								<?php 

									}

								?>>afgemaakt</option>

						</select>

						<label for="order<?=$lists[$i]['id']?>">verdeel in minuten</label>

						<select class="w100" name="order" id="order<?=$lists[$i]['id']?>">

							<option value="">niet</option>

							<option value="ASC"

								<?php 

									if ($_SESSION[strval($lists[$i]["id"]) . "ID"]["order"] == "ASC") {

								?>

									selected

								<?php 

									}

								?>>van klein naar groot</option>

							<option value="DESC"

								<?php 

									if ($_SESSION[strval($lists[$i]["id"]) . "ID"]["order"] == "DESC") {

								?>

									selected

								<?php 

									}

								?>>van groot naar klein</option>

						</select>

						<input type="submit" value="update">

					</form>

					<button class="w3-red" onclick="deleteList(<?=$lists[$i]['id']?>, `<?=$lists[$i]['name']?>`)">
						delete lijst
					</button>

					<h3>taken</h3>

					<ul class="w3-indigo">

						<?php 
							for ($x=0; $x < count($tasks); $x++) {
						?>

							<li class="task w3-yellow">

								<a href="http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/view/pages/askDeleteTask.php?id=<?=$tasks[$x]['id']?>" class="buttonLink w3-red">delete <?php print $tasks[$x]['task']?></a>

								<form action="http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/view/pages/index.php" method="GET">

									<input type="hidden" name="taskId" value="<?=$tasks[$x]['id']?>">

									<p><?=$tasks[$x]['task']?></p>

									<p>Hoeveelheid minuten: <?=$tasks[$x]['duration']?></p>

									<p>Status: <?=$tasks[$x]['status']?></p>

									<p class="w3-dark-grey">Voor meer informatie en om het aan te kunnen passen, klik hier:</p>

									<input type="submit" value="informatie" class="w100">

								</form>

							</li>

						<?php 

							}

						?>
						<li class="addingTask">
							<button class="addTaskB" onclick="addTask(<?=$lists[$i]["id"]?>, <?=$i?>)">Een taak toevoegen+</button>
						</li>

					</ul>

				</span>

			<?php 
				}
			?>

			<span class="lists inlineBlock VATop" id="addList">

				<span id="newList" class="list-container inlineBlock">

					<button onclick="addingList()" class="inlineBlock">+ Voeg lijst toe</button>

				</span>

			</span>

		</div>

		<script src="script.js"></script>
		
<?php 
	require "../pageParts/footer.php";
?>