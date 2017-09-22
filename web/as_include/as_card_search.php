<?php include AS_THEME."AS_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new AS_Dbconn();			
	
	$card_search = $_GET['AS_card_search'];
	$card_searchcat = $_GET['AS_catid'];
	if ($card_searchcat<=0){
		$card_search_cat = "All";
		$AS_db_query = "SELECT * FROM AS_card
		WHERE card_title like '%$card_search%'
		OR card_content like '%$card_search%'
		OR card_recipient like '%$card_search%'
		OR card_message like '%$card_search%'";
	} else {
		$card_search_cat = AS_cat_card($card_searchcat);
		$AS_db_query = "SELECT * FROM AS_card
		WHERE card_title like '%$card_search%'
		OR card_content like '%$card_search%'
		OR card_recipient like '%$card_search%'
		OR card_message like '%$card_search%' 
		OR card_cat like '%$card_searchcat%'";
	}
	
	$results = $database->get_results( $AS_db_query );
	
?>
	  <div id="content">
        <div class="content_card">
		<br>
		  <h1><?php echo $database->AS_num_rows( $AS_db_query ) ?> Elibrary Materials found
		  <a class="button_small" style="float:right;width:300px;text-align:center;" href="index.php?action=card_new">Add New Material</a> </h1> </div>
			<div class="tj_card" align="center">
			<form method="post" >
			<table style="width:100%;"><tr><td>
			<input type="text" class="input_card" name="AS_card_search" id="AS_card_search" placeholder="Search the library" value="<?php echo $card_search ?>" />
			</td><td>
				<select class="select_card" class="input_card" name="AS_catid">
				<option  value="<?php echo $card_searchcat ?>"><?php echo $card_search_cat ?></option>
			<?php $AS_cat_qry = "SELECT * FROM AS_category ORDER BY cat_title ASC";
				$cat_results = $database->get_results( $AS_cat_qry );
				
				foreach( $cat_results as $AS_cat ) { ?>
						<option value="<?php echo $AS_cat['catid'] ?>">  <?php echo $AS_cat['cat_title'] ?></option>
				<?php } ?>
				</select>
			</td>
			<td><input type="submit" style="width:200px" name="SearchThis" value="Search" /></td></tr>
			</table>
			</form>
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:30px;"></th>
				  <th>Category</th>
				  <th>Title</th>
				  <th>Publisher</th>
				  <th>Subject</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=card_view&amp;AS_cardid=<?php echo $row['cardid'] ?>'">
				   <td><img class="iconic" src="AS_media/<?php echo $row['card_img'] ?>" /></td>
				   <td><?php echo AS_cat_card($row['card_cat']) ?></td>
				   <td><?php echo $row['card_title'] ?></td>
		          <?php //echo substr($row['card_content'],0,100).'...' ?>
				  <td><?php echo $row['card_recipient'] ?></td>
				  <td><?php echo $row['card_message'] ?></td>
		          <td></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		
<?php include AS_THEME."AS_footer.php" ?>
    
