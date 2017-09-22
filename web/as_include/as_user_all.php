<?php include AS_THEME."AS_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new AS_Dbconn();			
	$AS_db_query = "SELECT * FROM AS_user ORDER BY userid DESC LIMIT 20";
	$results = $database->get_results( $AS_db_query );
?>
	  <div class="tj_card page_name" ><h1><?php echo $database->AS_num_rows( $AS_db_query ) ?> Members
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=user_new">New Member</a> </h1></div>
		<div class="tj_card" >	
			   <?php foreach( $results as $row ) { ?>
		        <table class="tt_tb">
                <tr onclick="location='index.php?action=user_view&amp;AS_userid=<?php echo $row['userid'] ?>'">
				   <td><img class="iconic" src="AS_media/<?php echo $row['user_avatar'] ?>" /></td>
				   <td><h2 class="nowrap"><?php echo $row['user_fname'].' '.$row['user_surname'] ?> <em>(<?php echo $row['user_level'] ?>)</em></h2>
		          <p class="nowrap"><?php echo $row['user_mobile'].' '.$row['user_email'] ?> since <?php echo date("j/m/y @ H:i", strtotime($row['user_joined'])); ?></p></td>
		        </tr>			
                </table>
			<?php } ?>
			
			</div>
<?php include AS_THEME."AS_footer.php" ?>
    
