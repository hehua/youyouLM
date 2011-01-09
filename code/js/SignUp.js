function check()
{
	if (checkNameFormat()&& checkPasswordFormat() && checkPasswordEqual() && checkPhoneNum() &&checkEmail())
		$("form").submit();
	else
		alert ("信息出错");
}

function checkNameFormat()
{
	var name = $("name").value;
	var nameInfo = $("nameInfo");
	var reg = /^\w{2,12}$/;
	if (reg.test(name)) {
		nameInfo.innerHTML = "2-12字符, 必须为英文数字或_";
		nameInfo.style.color = "black";
		return true;
	}
	else {
		nameInfo.innerHTML = "用户名格式不正确！！！";
		nameInfo.style.color = "red";
		return false;
	}
}

function checkPhoneNum()
{
	var phoneNum = $("phoneNum").value;
	var phoneNumInfo = $("phoneNumInfo");
	var reg = /^[0-9]{11}$/;
	if (reg.test(phoneNum)) {
		phoneNumInfo.innerHTML = "";
		return true;
	}
	else {
		phoneNumInfo.innerHTML = "手机号码格式不正确！！！";
		phoneNumInfo.style.color = "red";
		return false;
	}
}

function checkEmail()
{
	var email = $("email").value;
	var emailInfo = $("emailInfo");
	var reg = /^\s*([A-Za-z0-9_\-]+@(\w+\.)+\w{2,4})\s*$/;
	if (reg.test(email)) {
		emailInfo.innerHTML = "";
		return true;
	}
	else {
		emailInfo.innerHTML = "邮箱格式不正确 ！！！";
		emailInfo.style.color = "red";
		return false;
	}
}

function checkPasswordFormat()
{
	var password = $("password").value;
	var passwordInfo = $("passwordInfo");
	var reg = /^[a-zA-Z0-9]{4,12}$/;
	if (reg.test(password)) {
		passwordInfo.innerHTML = "4-12字符，必须为英文数字";
		passwordInfo.style.color = "black";
		return true;	
	}
	else {
		passwordInfo.innerHTML = "密码格式不正确！！！";
		passwordInfo.style.color = "red";
		return false;
	}

}

function checkPasswordEqual()
{
	var password =  $("password");
	var confirmPassword = $("confirmPassword");
	var confirmPasswordInfo = $("confirmPasswordInfo");
	if (password.value == confirmPassword.value) {
		confirmPasswordInfo.innerHTML = "";
		return true;
	}
	else {
		confirmPasswordInfo.innerHTML = "两次密码不相符 ！！！";
		confirmPasswordInfo.style.color = "red";
		return false;
	}
}

