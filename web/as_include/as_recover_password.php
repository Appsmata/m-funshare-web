<?php include AS_THEME."AS_header.php" ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_card">
		  <center>		  
		  <br>
		  <h1>Password Recovery Center</h1>
		  	<?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
				
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
			}
			unset($_SESSION['ERRMSG_ARR']);
			} ?>	  
		  <br>		  
		  <hr><br>
		  <h2>Reset Your Password</h2>
			<form action="index.php?action=recover_password" method="post" >
			<input type="hidden" name="username" value="<?php echo $_SESSION['recover_password'] ?>" />
			<table style="width:100%;font-size:20px;">
				<tr>
					<td>New Password (*required)</td>
					<td><input type="password" class="input_card" name="password" id="password" autocomplete="off" required autofocus  maxlength="20"/></td>
				</tr>
				<tr><td>Confirm Password (*required)</td>
			<td>
			<input type="password" class="input_card" name="passwordcon" id="passwordcon" autocomplete="off" required autofocus maxlength="20" />
			</td></tr>
			</table>
			<input type="submit" id="aalogin-button" name="RecoverPassword" value="Reset Password" />
        
      </form>
		  </center>
		  
		</div><!--close content_card-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
  <?php include AS_THEME."AS_footer.php" ?>
    
