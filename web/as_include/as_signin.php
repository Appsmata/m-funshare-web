<?php include AS_THEME."AS_header.php" ?>
	<div class="tj_card page_name" ><center>
		  <h1>Sign In to Your Account to Continue</h1>
		  	<?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
				
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
			}
			unset($_SESSION['ERRMSG_ARR']);
			} ?>	  
		  </center></div>
          <div class="tj_card" ><form action="index.php?action=login" method="post" >
			<input type="text" class="input_card" name="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" />
			<input type="password" class="input_card" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" />
			<input type="submit" class="mysubmith" name="SignMeIn" value="Sign In" />
        
      </form></div>
	  
  <?php include AS_THEME."AS_footer.php" ?>
    
