<?php 

	include AS_FUNC.'AS_dbcheck.php';

	AS_check_users();
    
    function AS_safi($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		//return mysql_real_escape_string($str);
		return mysqli::real_escape_string ($str);
	} 

	function AS_check_users(){
      		if (!AS_check_admin())  {
               	     die(AS_I_TOP.'CREATE AN ADMINISTRATOR'.AS_I_TOP_A.'<form action="'.AS_new_admin().'" method="post">
                        <h5>There are no users yet! That means you need to set up an Administrator first...</h5><table>
             <tr><td>First Name:</td><td><input type="text" name="fname" autocomplete="off" required></td></tr>
             <tr><td>Last Name:</td><td><input type="text" name="surname" autocomplete="off" required></td></tr>
             <tr><td>Username:</td><td><input type="text" name="username" autocomplete="off" required></td></tr>
             <tr><td>Email Address:</td><td><input type="text" name="email" autocomplete="off" required></td></tr>
             <tr><td>Password:</td><td><input type="password" name="password" autocomplete="off" min="8" required></td></tr> 
             </table><br>
              <center><input type="submit" class="submit_this" name="SetAdministrator" value="Create An Administrator"></center><br></form>'.AS_I_BOT);
                        
             } else {
                 AS_check_functions();
             }
	}
    
    function AS_check_functions(){
      if (!AS_check_options())  {
               die(AS_I_TOP.'SITE OPTIONS'.AS_I_TOP_A.'<form action="'.AS_new_options().'" method="post">
                        <table><tr><td>Site Name:</td><td><input type="text" name="sitename"  value="'.AS_get_option('sitename').'"></td></tr>
                        <tr><td>Site Url:</td><td><input type="text" name="siteurl" autocomplete="off" value="'.AS_SITEURL.'"></td></tr>
                        <tr><td>Keywords</td><td><input type="text" name="keywords" autocomplete="off"  value="'.AS_get_option('keywords').'"></td></tr>
                        <tr><td>Descriptions</td><td><textarea name="description">'.AS_get_option('description').'</textarea></td></tr></table><br>
                        <center><input type="submit" class="submit_this" name="SaveSite" value="Save Options"></center><br></form>'.AS_I_BOT);
                                
     }
}
	
	
	
	
	