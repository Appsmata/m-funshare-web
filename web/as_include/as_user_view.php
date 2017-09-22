<?php 

	$userid = $results['user'];
	$AS_db_query = "SELECT * FROM AS_user WHERE userid = '$userid'";
	$database = new AS_Dbconn();
	if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
	list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_level, $user_joined, $user_mobile, $user_web, $user_avatar) = $database->get_row( $AS_db_query );
}
		
?>

<?php include AS_THEME."AS_header.php"; ?>
        <div class="tj_card page_name" ><center>

		  <h1>User Profile</h1> </div>
			<div class="tj_card">
				<div class="iconic_infol">
					<img src="<?php echo "AS_media/".$user_avatar ?>" class="iconic_big"/>
					<a href="index.php?action=edituser&&AS_userid=<?php echo $userid ?>"><h1>Edit User</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deleteuser&&AS_userid=<?php echo $userid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $user_name ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete User</h1></a>
			    </div>
				<div class="detail_info">
					<h2><?php echo $user_fname.' '.$user_surname ?></h2>
<hr class="detail_info_hr"/>
					<h2>Username: <?php echo $user_name ?></h2>
					<h2>Email: <?php echo $user_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($user_joined)); ?><h2>
				</div>
				</div>
			</div>
		
<?php include AS_THEME."AS_footer.php" ?>
    
