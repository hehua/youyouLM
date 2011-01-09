function check()
{
	if (checkNameFormat()&& checkPasswordFormat() && checkPasswordEqual() && checkPhoneNum() &&checkEmail())
		$("form").submit();
	else
		alert ("��Ϣ����");
}

function checkNameFormat()
{
	var name = $("name").value;
	var nameInfo = $("nameInfo");
	var reg = /^\w{2,12}$/;
	if (reg.test(name)) {
		nameInfo.innerHTML = "2-12�ַ�, ����ΪӢ�����ֻ�_";
		nameInfo.style.color = "black";
		return true;
	}
	else {
		nameInfo.innerHTML = "�û�����ʽ����ȷ������";
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
		phoneNumInfo.innerHTML = "�ֻ������ʽ����ȷ������";
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
		emailInfo.innerHTML = "�����ʽ����ȷ ������";
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
		passwordInfo.innerHTML = "4-12�ַ�������ΪӢ������";
		passwordInfo.style.color = "black";
		return true;	
	}
	else {
		passwordInfo.innerHTML = "�����ʽ����ȷ������";
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
		confirmPasswordInfo.innerHTML = "�������벻��� ������";
		confirmPasswordInfo.style.color = "red";
		return false;
	}
}

