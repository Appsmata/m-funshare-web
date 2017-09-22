<?php 

	$cardid = $results['card'];
	$AS_db_query = "SELECT * FROM AS_card WHERE cardid = '$cardid'";
	$database = new AS_Dbconn();
	if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
	list( $cardid, $card_cat, $card_slug, $card_title, $card_content, $card_color, $card_postedby, $card_posted, $card_img, $card_updated, $card_updatedby) = $database->get_row( $AS_db_query );
}
		
?>
<?php include AS_THEME."AS_header.php"; ?>
        <div class="tj_card page_name" ><center>
		  <h1>Edit Card</h1> </div>
			<div class="tj_card">
				<form role="form" method="post" name="UpdateCard" action="index.php?action=card_view&&AS_cardid=<?php echo $cardid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Category:</td>
					<td><select class="select_card" name="category" style="padding-left:20px;">
				<?php $AS_db_query = "SELECT * FROM AS_category ORDER BY cat_title ASC";
					$database = new AS_Dbconn();			
					$results = $database->get_results( $AS_db_query );
					
				foreach( $results as $row ) { ?>
					<option <?php if ($card_cat==$row['catid']) echo "selected"; ?> 
						value="<?php echo $row['catid'] ?>"><?php echo $row['cat_title'] ?></option>
				<?php } ?>
					</select>
				  </td>
				</tr>
				<tr>
					<td>Card Color:<br>
					<span style="background:<?php echo getColorText($card_color) ?>;
					color:<?php echo getColorText($card_color) ?>" > -------------- </span>
					</td>
					<td>
					<table><tr>
					<td><label>
						<input type="radio" name="color" value="#FFFFFF|Default"> 
						Default (white)</label></td>
					<td><label>
						<input type="radio" name="color" value="#000000|Black"/>
						<span style="background:#000000;color:#000000" > ------</span>
						 Black </label></td>
					<td><label>
						<input type="radio" name="color" value="#FF0000|Red"/>
						<span style="background:#FF0000;color:#FF0000" > ------</span>
						 Red </label></td>
					</tr>
					<tr>
					<td><label>
						<input type="radio" name="color" value="#FFA500|Orange"/>
						<span style="background:#FFA500;color:#FFA500" > ------</span>
						 Orange </label></td>
					<td><label>
						<input type="radio" name="color" value="#FFFF00|Yellow"/>
						<span style="background:#FFFF00;color:#FFFF00" > ------</span>
						 Yellow </label></td>
					<td><label>
						<input type="radio" name="color" value="#FFC0CB|Pink"/>
						<span style="background:#FFC0CB;color:#FFC0CB" > ------</span>
						 Pink </label></td>
					</tr>
					<tr>
					<td><label>
						<input type="radio" name="color" value="#800080|Purple"/>
						<span style="background:#800080;color:#800080" > ------</span>
						 Purple </label></td>
					<td><label>
						<input type="radio" name="color" value="#800000|Maroon"/>
						<span style="background:#800000;color:#800000" > ------</span>
						 Maroon </label></td>
					<td><label>
						<input type="radio" name="color" value="#0000FF|Ble"/>
						<span style="background:#0000FF;color:#0000FF" > ------</span>
						 Blue </label></td>
					</tr>
					<tr>
					<td><label>
						<input type="radio" name="color" value="#008000|Green"/> 
						<span style="background:#008000;color:#008000" > ------</span>
						 Green</label></td>
					<td><label>
						<input type="radio" checked name="color" value="#FFD700|Gold"/>
						<span style="background:#FFD700;color:#FFD700" > ------</span>
						 Gold </label></td>
					</tr></table>
				  </td>
				</tr>
				<tr>
					<td>Title:</td>
					<td><input type="text" class="input_card" autocomplete="off" name="title" value="<?php echo $card_title ?>"></td>
				</tr>
				<tr> 
					<td>Card Icon:</td>
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
					<td>Description:</td>
					<td><textarea class="input_card" style="height:200px" name="content" autocomplete="off" ><?php echo $card_content ?></textarea></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="mysubmith" name="DeleteCard" value="Delete Card">
						<input type="submit" class="mysubmith" name="SaveCard" value="Save Changes">
						<input type="submit" class="mysubmith" name="SaveClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		
<?php include AS_THEME."AS_footer.php" ?>
    
