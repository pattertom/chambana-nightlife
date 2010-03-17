// get an HTTP object depending on the browser
function getHTTPObject() {
	if (window.ActiveXObject)
		return new ActiveXObject("Microsoft.XMLHTTP");
	else if (window.XMLHttpRequest)
		return new XMLHttpRequest();
	else {
		alert("Your browser does not support AJAX");
		return null;
	}
}

// redirect to the page you came from
function goBackAPage() {
	history.go(-1);
}

// clears text from a comment box
function clickIntoSearchBox() {

	document.forms[0].elements[0].value = '';
}