var auth2;

function onSignIn(googleUser) 
{
	  //alert("Signed In");
	  
	  var profile = googleUser.getBasicProfile();
	  //alert(profile.getId());
	  //alert(profile.getName());
	  //alert(profile.getImageUrl());
	  //alert(profile.getEmail());
	  
	  //console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
	  //console.log('Name: ' + profile.getName());
	  //console.log('Image URL: ' + profile.getImageUrl());
	  //console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
	  
	  //window.location.href = "tutor/tutor_dashboard.php";
	  
	  auth2 = gapi.auth2.getAuthInstance();	  
	  
	  //sessionStorage.setItem("auth2", auth2);
	  
	  //auth2.signOut();
	  //alert(sessionStorage.getItem("auth2"));
}
	
function signOut() 
{
		//alert("Signed out");	
		
		auth2.signOut().then(function () 
		{ 	  
		  //var x = document.cookie;
		  //alert(x);		  
		  //deleteAllCookies();
		  
		  //var y = document.cookie;
		  //alert(y);
		  		  
		  //console.log('User signed out.');
		  
		  location.href="http://localhost/joshua/dodda/register.php";
		});
		
}


	
  