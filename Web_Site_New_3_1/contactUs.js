function validate(){
	var fname = document.forms["myForm1"]["fname"].value;
	var lname = document.forms["myForm1"]["lname"].value;
	var email = document.forms["myForm1"]["email"].value;
	var mobNo = document.forms["myForm1"]["mobNo"].value;
	var country = document.forms["myForm1"]["country"].value;
	var state = document.forms["myForm1"]["state"].value;
	var textarea = document.forms["myForm1"]["textarea"].value;


	if(isAlpha(fname, "First Name")){
		if(isAlpha(lname, "Last Name")){
			if(mailVal(email)){
				if(isNum(mobNo, "Phone Number")){
					if(isAlpha(country, "Country")){
						if(isAlpha(state, "State")){
							if(!isEmpty(textarea, "textarea")){
								alert("Your Information has been saved successfully !");
								return true;
							}else return false;
						}else return false;
					}else return false;
				}else return false;
			}else return false;
		}else return false;
	}else return false;

}

function isEmpty(val, fie){
	if(val=="" || val==null){
		alert(fie+" field cannot be empty !");
		return true;
	}
	else return false;
}
function isAlpha(val, fie){
	if(!isEmpty(val, fie)){
		var temp=/^[a-zA-z]+$/;
		if(val.match(temp)){
			return true;
		}
		else alert("Use only letters for "+fie+" field !");
		return false;
	}
	return false;
}
function isNum(val, fie){
	if(!isEmpty(val, fie)){
		var temp=/^[0-9]+$/;
		if(val.match(temp)){
			return true;
		}
		else alert("Use only numbers for "+fie+" field !");
		return false;
	}
	return false;
}
function mailVal(val){
	if(!isEmpty(val, "E-mail")){
		var dotpos=val.indexOf(".");
		var atpos=val.indexOf("@");

		if(atpos<1 || (atpos+2>=dotpos) || (dotpos+2>=val.length)){
			alert("Input valid e-mail address !");
			return false;
		}
		else return true;
	}
	else return false;
}
