// GLOBALS

var todo = [];

addEventListener("load", page_init);
addEventListener("onunload", cookie_save);

// BASIC INTERACTION

function add_todo()
{
	var input = prompt('What do you need to do?', '');
	if (input !== '')
	{
		var list = document.getElementById('ft_list');
		var div = document.createElement("div");
		// div.onclick = finish_todo; // Works, but doesn't.
		div.setAttribute('onclick', "finish_todo(this)");
		div.innerText = input;

		list.insertBefore(div, list.firstChild);
		todo.unshift(input);
		cookie_save();
	}
}

function finish_todo(e)
{
	var input = confirm('Are you done with this task?');

	if (input == true)
	{
		e.remove();
		var index = todo.findIndex((i) => i == e.innerText);
		if (~index) todo.splice(index, 1);
	}

	cookie_save();
}

// PERSISTENCE

function page_init()
{
	var cookie = cookie_load();
	if (cookie === undefined)
		todo = [];
	else
		todo = cookie.split('=')[1].split('|').filter(Boolean);
	todo_to_html(todo);
}

function cookie_load()
{
	return document.cookie.split('; ')
		.find(row => row.startsWith('ft_list'));
}

function todo_to_html(array)
{
	if (array !== 'undefined')
	{
		var list;
		var div;
		for (const thing of array)
		{
			list = document.getElementById('ft_list');
			div = document.createElement("div")
			div.setAttribute('onclick', "finish_todo(this)");
			div.innerText = thing;
			list.appendChild(div, list.firstChild);
		}
	}
}

function cookie_save()
{
	document.cookie = todo_stringify();
}

function todo_stringify()
{
	var str = 'ft_list=';
	for (const thing of todo)
	{
		str += ('|' + thing);
	}
	return str;
}
