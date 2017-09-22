<?php include AS_THEME."AS_header.php"; ?>
        <div class="tj_card page_name" ><center>

		  <h1>Add a category</h1> </div>
			<div class="tj_card">
				<form role="form" method="post" name="PostCategory" action="index.php?action=category_new" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Category Title:</td>
					<td><input type="text" class="input_card" autocomplete="off" name="title"></td>
				</tr>
				<tr>
					<td>Upload Category Icon:</td>
					<td><input name="filename" autocomplete="off" type="file" class="file_card" accept="image/*"></td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea class="input_card" name="content" autocomplete="off" ></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="mysubmith" name="AddCart" value="Save & Add">
						<input type="submit" class="mysubmith" name="AddClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		
<?php include AS_THEME."AS_footer.php" ?>
    
