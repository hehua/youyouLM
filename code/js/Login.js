function checkLogin()
{
	var vc = $("vc").value;
	var url = "CheckValidationCode.php";
	new Ajax.Request(url , {
		method : 'GET',
		parameters :{ "vc" : vc} ,
		onSuccess : success,
		onFailure : failure
	});
	
	
	
}

function success(ajax)
{
	if (ajax.responseText=="yes") {
		$("form").submit();
	}
	if (ajax.responseText=="no") {
		alert ("ValidationCode Error!!!");
	}
}

function failure()
{
	alert ("Error!!!");
}







