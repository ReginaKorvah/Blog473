window.onload = pageLoad;

function pageLoad() {
	$("dogButton").onclick = dogClick;
	new Ajax.Request("blog.json",
	{
		method:"get",
		onSuccess: show,
		onFailue: ajaxFailure,
		onException: ajaxFailure
	}
}

function show(ajax) {
	var data = JSON.parse(ajax.responseText);
	for(var i = 0; i < data.Blogs.length; i++) {
		var h = document.createElement("h1");
		h.innerHTML = data.Blogs[i].Topic;
		document.body.appendChild(h);
		var p = document.createElement("p");
		h.innerHTML = data.Blogs[i].Post;
		document.body.appendChild(p);
		var n = document.createElement("p");
		h.innerHTML = data.Blogs[i].Name;
		document.body.appendChild(n);
	}
}

function dogClick() {
	new Ajax.Request("blog.json",
		{
			method:"get",
			onSuccess: add,
			onFailure: ajaxFailure,
			onException: ajaxFailure
		}
	);
}

function add(ajax)
{	
	var data = JSON.parse(ajax.responseText);
	data.stringify({Name: $("name").value, Topic: $("Topic").value, Post: $("Post:).value});
}

function ajaxFailure(ajax, exception) {
	alert("Error making Ajax request:" + "\n\nServer status: \n"
		+ ajax.status + " " + ajax.statusText
		+ "\n\nServer response text: \n" + ajax.responseText);
	if (exception) {
		throw exception;
	}
}