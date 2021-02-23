function dataCheck() {
	var username = document.getElementById("user").value;
	var password = document.getElementById("pass").value;

	for (i = 0; i < jsonData.length; i++) {
		if(username == jsonData[i].username && password == jsonData[i].password) 
		{
			alert(username + " is logged in!")
			return;
		}
	}
	alert("Incorrect username or password. Please try again.")
}