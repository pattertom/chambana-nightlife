window.onload = function () {
	new Ajax.Autocompleter("function_name", "autocomplete_choices", "http://localhost:8888/index.php/bar/ajaxsearch/", {});
}

