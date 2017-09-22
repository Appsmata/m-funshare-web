<?php 

	$cardid = $results['card'];
	$AS_db_query = "SELECT * FROM AS_card WHERE cardid = '$cardid'";
	$database = new AS_Dbconn();
	if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
	list( $cardid, $card_code, $card_cat, $card_slug, $card_title, $card_content, $card_postedby, $card_posted, $card_img, $card_updated, $card_updatedby) = $database->get_row( $AS_db_query );
}
		
?>
<?php include AS_THEME."AS_header.php"; ?>
        <div class="tj_card page_name" ><center>

		  <h1>Edit a Elibrary Material</h1> </div>
			<div class="tj_card">
				<form role="form" method="post" name="SaveCard" action="index.php?action=card_edit&&AS_cardid=<?php echo $cardid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Category:</td>
					<td><select class="select_card" name="category" style="padding-left:20px;">
						<option value="<?php echo $cardid ?>" > - Choose a Category - </option>
			<?php $AS_db_query = "SELECT * FROM AS_category ORDER BY cat_title ASC";
				$database = new AS_Dbconn();			
				$results = $database->get_results( $AS_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['catid'] ?>">  <?php echo $row['cat_title'] ?></option>
				<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Title of the Material:</td>
					<td><input type="text" class="input_card" autocomplete="off" name="title" value="<?php echo $card_title ?>"></td>
				</tr>
				<tr>
					<td>Code of the Material:</td>
					<td><input type="text" class="input_card" autocomplete="off" name="code" value="<?php echo $card_code ?>"></td>
				</tr>
				<tr>
					<td>Upload Card Icon:</td>
					<td>
					<input type="hidden" name="cardimg" value="<?php echo $card_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'AS_media/'.$card_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" class="file_card" accept="image/*" >
						</td></tr></table>
					</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea class="input_card" style="height:200px" name="content" autocomplete="off" ><?php echo $card_content ?></textarea></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="mysubmith" name="SaveCard" value="Save Changes">
						<input type="submit" class="mysubmith" name="SaveClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		
<?php include AS_THEME."AS_footer.php" ?>
    
