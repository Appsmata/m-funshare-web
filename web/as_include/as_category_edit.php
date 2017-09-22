<?php 

	$catid = $results['category'];
	$AS_db_query = "SELECT * FROM AS_category WHERE catid = '$catid'";
	$database = new AS_Dbconn();
	if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
	list( $catid, $cat_slug, $cat_title, $cat_icon, $cat_content) = $database->get_row( $AS_db_query );
}
		
?>

<?php include AS_THEME."AS_header.php"; ?>
        <div class="tj_card page_name" ><center>

		  <h1>Edit category</h1> </div>
			<div class="tj_card">
				<form role="form" method="post" name="PostCategory" action="index.php?action=category_edit&&AS_catid=<?php echo $catid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Category Title: </td>
					<td><input type="text" class="input_card" autocomplete="off" name="title" value="<?php echo $cat_title ?>"></td>
				</tr>
				<tr>
					<td>Category Icon:</td>
					<td>		
						<input type="hidden" name="caticon" value="<?php echo $cat_icon ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'AS_media/'.$cat_icon ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" class="file_card" accept="image/*" >
						</td></tr></table>
						</td>
				</tr>
                
                <tr>
					<td>Description:</td>
					<td><textarea class="input_card" name="content" autocomplete="off" ><?php echo $cat_content?></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="mysubmith" name="SaveCart" value="Save Changes">
						<input type="submit" class="mysubmith" name="SaveClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		
<?php include AS_THEME."AS_footer.php" ?>
    
