<?php include AS_THEME."AS_header.php" ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_card">
		  <center>		  
		  <br>
		  <h1>Sorry for Loosing your password</h1>
		  	<?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
				
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
			}
			unset($_SESSION['ERRMSG_ARR']);
			} ?>	  
		  <br>		  
		  <hr><br>
		  <h2>Fill in the form below to get assistance on recovering your pasword</h2>
          <form action="index.php?action=forgot_password" method="post" >
			<table style="width:100%;font-size:20px;">
				<tr>
					<td>Enter your username (*required)</td>
					<td><input type="text" class="input_card" name="username" id="username" autocomplete="off" required autofocus  /></td>
				</tr>
				<tr><td>Enter your email (*required)</td>
			</td><td>
			<input type="email" name="email" id="email" autocomplete="off" required autofocus />
			</td></tr>
			</table>
			<input type="submit" id="aalogin-button" name="ForgotPassword" value="Forgot Password" />
        
      </form></center>
		  
		</div><!--close content_card-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
  <?php include AS_THEME."AS_footer.php" ?>
    
