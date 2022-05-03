window.onload = pageLoad;

function pageLoad(){
	var startBlog = $("new-blog-form");
	startBlog.style.display = "none";

	var openFormBut = $("open-form-button");
	openFormBut.onclick = openForm;

	var submitBlog = $("submit");
	submitBlog.onclick = submitForm;
	
	new Ajax.Request("blog.json",
	{
		method:"get",
		onSuccess: show,
		onFailue: ajaxFailure,
		onException: ajaxFailure
	});
}

function show(ajax) {
	var data = JSON.parse(ajax.responseText);
	var blog = $("blog");

	for(var i = 0; i < data.Blogs.length; i++){
		var blogPost = document.createElement("div");
		blogPost.className = "blog-post";
		blog.appendChild(blogPost);

		var titleLink = document.createElement("a");
		titleLink.href = "javascript:;";
		titleLink.onclick = "showPost();";
		titleLink.innerHTML = "Blog: " + data.Blogs[i].Topic;

		var title = document.createElement("h2");
		title.id = "blog-title";
		title.className = "blog-title"
		blogPost.appendChild(title);
		title.appendChild(titleLink);

		var blogContent = document.createElement("div");
		blogContent.className = "blog-content";
		blogPost.appendChild(blogContent);

		var blogHead = document.createElement("div");
		blogHead.className = "blog-head";
		blogContent.appendChild(blogHead);

		var image = document.createElement("img");
		image.className = "user-icon";
		image.src = "userimage.png";
		blogHead.appendChild(image);

		var name = document.createElement("h4");
		name.className = "user-name";
		name.innerHTML = data.Blogs[i].Name;
		blogHead.appendChild(name);

		var blogText = document.createElement("p");
		blogText.className = 'blog-text';
		blogText.innerHTML = data.Blogs[i].Post;
		blogContent.appendChild(blogText);
	}
}


function add(ajax){
	var today = new Date();	
	var data = JSON.parse(ajax.responseText);
	data.stringify({Name: $("name").value, Topic: $("topic").value, Post: $("post").value, Likes: 0});
}

function ajaxFailure(ajax, exception) {
	alert("Error making Ajax request:" + "\n\nServer status: \n"
		+ ajax.status + " " + ajax.statusText
		+ "\n\nServer response text: \n" + ajax.responseText);
	if (exception) {
		throw exception;
	}
}

function openForm(){
	this.style.display = "none";

	var form = $('new-blog-form');
	form.style.display = "";
}

function submitForm(){
	var filled = checkForm();
	
	if(filled){
		new Ajax.Request("blog.json",
		{
			method:"get",
			onSuccess: add,
			onFailure: ajaxFailure,
			onException: ajaxFailure
		}
	);

		let button = $("open-form-button");
		button.style.display = "";

		let form = $("new-blog-form");
		form.style.display = "none";
	}
	
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