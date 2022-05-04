window.onload = pageLoad;

function pageLoad() {
	var startBlog = $("new-blog-form");
	startBlog.style.display = "none";

	var openFormBut = $("open-form-button");
	openFormBut.onclick = openForm;

	var submitBlog = $("submit");
	submitBlog.onclick = submitForm;
}

function openForm() {
	$("open-form").style.display = "none";

	var form = $('new-blog-form');
	form.style.display = "";
}

function submitForm() {
	var filled = checkForm();
	if (filled) {
		let button = $("open-form-button");
		button.style.display = "";

		let form = $("new-blog-form");
		form.style.display = "none";
	}

}

function checkForm() {
	var inputs = document.getElementsByClassName("input-val");
	for (var i = 0; i < inputs.length; i++) {
		if (inputs[i].value == "") {
			return false;
		}
	}
	return true;
}

function getHeart() {
	
	if(this.src == 'heartUnfilled.jpg'){
		this.src = 'heartFilled.jpg';

	}
}