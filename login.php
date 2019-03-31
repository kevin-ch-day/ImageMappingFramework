<?php
require_once('includes\header.inc');
?>

<div id="content">
  <div id="main-menu">
    <h2>Login</h2>
	
	<div class = "container form-signin">
         
         <?php
            $msg = '';
            
            if (isset($_POST['login']) &&
					!empty($_POST['username']) &&
					!empty($_POST['password'])) {
				
               if ($_POST['username'] == 'Kevin' && 
						$_POST['password'] == '1234') {
						$_SESSION['valid'] = true;
						$_SESSION['timeout'] = time();
						$_SESSION['username'] = 'tutorialspoint';
                  
                  echo 'Valid username and password';
				  
               }else {
                  $msg = 'Wrong username or password';
               }
            }
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" name = "username" placeholder = "Username" required autofocus></br>
            <input type = "password" class = "form-control" name = "password" placeholder = "Password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"  name = "login">Login</button>
         </form>
			
         <br/>Click here to <a href = "logout.php" tite = "Logout">logout</a>
         
      </div> 
  </div>
</div>

<?php
require_once('includes\footer.inc');
?>