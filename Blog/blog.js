window.onload = pageLoad;

function pageLoad() {
	var startBlog = $("new-blog-form");
	startBlog.style.display = "none";

	var openFormBut = $("open-form-button");
	openFormBut.onclick = openForm;
}

function openForm(){
	this.style.display = "none";

	var form = $('new-blog-form');
	form.style.display = "";
}

function checkForm(){
	var inputs = document.getElementsByClassName("input-val");
	for(var i=0; i < inputs.length; i++){
		if(inputs[i].value == "") {
			return false;
		}
	}
	return true;
}