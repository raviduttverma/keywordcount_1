<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="public/css/login.css">


<div class = "container">
	<div class="wrapper">
		<form action="Login/UserLogin" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Login</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control" name='username' id='username' placeholder="Email Id" required="" autofocus="" />
			  <input type="password" class="form-control" name='password' id='password' placeholder="Password" required=""/>     		  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="submit">Login</button>  			
			  <a class="btn btn-lg btn-primary btn-block" href='Register' class="btn btn-warning">New user Register here</a>	
		</form>
        		
	</div>
</div>