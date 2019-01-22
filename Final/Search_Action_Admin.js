function searchIcon3(){
	var x = document.getElementById["search1"].value;

	if(x == "" || x == null){
		alert("Enter an Item You Want to Search !!!!");
		return false;
	}
	else{
		window.location.assign("Search_Display_Admin.php");	
		return true;
	}
}