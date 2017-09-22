<?php include AS_THEME."AS_header.php"; ?>
        <div class="tj_card page_name" ><center>

		  <h1>Add a Card:</h1> </div>
			<div class="tj_card">
				<form role="form" method="post" name="PostCard" action="index.php?action=card_new" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Category:</td>
					<td><select class="select_card" name="category" style="padding-left:20px;">
						<option value="" > - Choose a Category - </option>
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
					<td>Card Color:</td>
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
						<input type="radio" name="color" value="#FFD700|Gold"/>
						<span style="background:#FFD700;color:#FFD700" > ------</span>
						 Gold </label></td>
					</tr></table>
				  </td>
				</tr>
				<tr>
					<td>Title of the Card:</td>
					<td><input type="text" class="input_card" autocomplete="off" name="title"></td>
				</tr>
				<tr>
					<td>Upload Card Icon:</td>
					<td><input name="filename" autocomplete="off" type="file" class="file_card" accept="image/*"></td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea class="input_card" name="content" autocomplete="off" ></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="mysubmith" name="AddCard" value="Save & Add">
						<input type="submit" class="mysubmith" name="AddClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		
<?php include AS_THEME."AS_footer.php" ?>
    
