var addList = document.getElementById("addList");
var newList = document.getElementById("newList");
var form = document.createElement("form");
form.action = window.location.href;
form.method = "post";
var acInp = document.createElement("input");
acInp.type = "hidden";
acInp.name = "action";
var nameIn = document.createElement("input");
nameIn.type = "text";
nameIn.name = "name";
nameIn.className = "form";
var notAddingList = document.createElement("button");
var closeAddList = document.createElement("i");
closeAddList.className = "fa fa-close";
notAddingList.appendChild(closeAddList);
var delBG = document.createElement("div");
delBG.className = "bg z3";
var delCon = document.createElement("div");
delCon.className = "w3-white";
delCon.style.position = "fixed";
delCon.style.left = "35vw";
delCon.style.top = "5vw";
delCon.style.width = "30vw";
delBG.appendChild(delCon);
var delH3 = document.createElement("h3");
delCon.appendChild(delH3);
var delAc = document.createElement("input");
delAc.type = "hidden";
delAc.name = "action";
var delId = document.createElement("input");
delId.type = "hidden";
delId.name = "id";
var delSub = document.createElement("input");
delSub.type = "submit";
delSub.value = "deleten";

var indexAddTaskB = 0;

var addingTask = document.getElementsByClassName("addingTask");
var addTaskB = document.getElementsByClassName("addTaskB");

function addingList(){
	not();
	newList.style.display = "none";
	addList.appendChild(notAddingList);
	notAddingList.addEventListener("click", notAddList);
	addList.appendChild(form);
	form.appendChild(acInp);
	acInp.value = "addList";
	form.appendChild(nameIn);
}
function notAddList(){
	remForm();
	notAddingList.remove();
	notAddingList.removeEventListener("click", notAddList);
	newList.style.display = "inline-block";
}
function addTask(id, index){
	not();
	indexAddTaskB = index;
	addTaskB[indexAddTaskB].style.display = "none";
	addingTask[indexAddTaskB].appendChild(notAddingList);
	notAddingList.addEventListener("click", notAddTask);
	addingTask[indexAddTaskB].appendChild(form);
	form.appendChild(acInp);
	acInp.value = "addTask";
	form.appendChild(delId);
	delId.value = id;
	form.appendChild(nameIn);
}
function notAddTask(){
	remForm();
	notAddingList.remove();
	notAddingList.removeEventListener("click", notAddTask);
	addTaskB[indexAddTaskB].style.display = "inline-block";
}
function deleteList(id, name){
	not();
	document.body.appendChild(delBG);
	delCon.insertBefore(notAddingList, delH3);
	notAddingList.addEventListener("click", notDeleteList);
	delCon.appendChild(form);
	form.appendChild(acInp);
	acInp.value = "deleteList";
	form.appendChild(delId);
	form.appendChild(delSub);
	delId.value = id;
	delH3.innerText = "Weet u zeker dat u de lijst " + name + " wilt verwijderen?";
}
function notDeleteList(){
	delBG.remove();
	notAddingList.remove();
	notAddingList.removeEventListener("click", notDeleteList);
	remForm();
}
function remForm(){
	form.innerText = "";
	form.remove();
}

function not(){
	notAddList();
	notDeleteList();
}