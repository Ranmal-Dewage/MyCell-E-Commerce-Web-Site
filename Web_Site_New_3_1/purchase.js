function formValidate()
    {
        var cardno = document.forms["myForm"]["cno"].value;
        var expdate = document.forms["myForm"]["expdate"].value;
        var scode = document.forms["myForm"]["scode"].value;
        var fname = document.forms["myForm"]["fname"].value;
        var lname = document.forms["myForm"]["lname"].value;
        var address = document.forms["myForm"]["address"].value;

        if(isNum(cardno,"Card Number")){
            if(!isEmpty(expdate,"Expiration Date")){
                if(isNum(scode,"Security Code")){
                    if(isAlpha(fname,"First Name")){
                        if(isAlpha(lname,"Last Name")){
                            if(!isEmpty(address,"Address")){
                                    alert("Successfully Submitted !");
                                    //window.location.assign("./purchase_Action.php?");
                                    return true;
                            }else return false;
                        }else return false;
                    }else return false;
                }else return false;
            }else return false;
        }else return false;

    }


    function isEmpty(elemValue,field) {
   		if(elemValue ==""  ||  elemValue == null) {
  		alert("You Can not have " + field + " Empty");
  		return true;
  		}
  		else
   		return false;
    }

    function isAlpha(val, fie){     /*fie is first name*/
    	  if(!isEmpty(val, fie)){
    		var temp=/^[a-zA-z]+$/;
    		if(val.match(temp)){
    			return true;
    		}
    		else alert("Use Only Letters for "+fie+" Field !");
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
      		else alert("Use Only Numbers for "+fie+" Field !");
      		return false;
      	}
      	return false;
    }
