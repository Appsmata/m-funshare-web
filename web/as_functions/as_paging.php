<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_card_cart($cartno) {
		$my_db_query = "SELECT * FROM my_category WHERE catid = '$cartno'";
		$database = new AS_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $catid, $cat_slug, $cat_title) = $database->get_row( $my_db_query );
		    return $cat_title;
		} else  {
		    return false;
		}
		
	}
	

	function my_card_seller($userid, $infor) {
		$my_db_query = "SELECT * FROM my_user_account WHERE userid = '$userid'";
		$database = new AS_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_level, $user_points, $user_bio, $user_mailcon, $user_joined, $user_mobile, $user_web, $user_location, $user_security_quiz, $user_security_ans, $user_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_cat_cards(){
		$my_db_query = "SELECT * FROM my_category";
		$database = new AS_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['catid'].'">'.$row['cat_title'].'</option>';		                            
		}			
	}

	function my_latest_catcards($catid){
		$my_db_query = "SELECT * FROM my_card WHERE card_cat = '$catid' LIMIT 4";
		$database = new AS_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_cat_cards_home(){
		$my_db_query = "SELECT * FROM my_category";
		$database = new AS_Dbconn();
		
		$card_cats = $database->get_results( $my_db_query );
		foreach( $card_cats as $cat )
		{
		    $card_cat = $cat['catid'];
			
			$my_cat_cards_query = "SELECT * FROM my_card WHERE card_cat = '$card_cat' LIMIT 4";
			
			if ($my_cat_cards_query) {
				echo '<hr><h3>'.$cat['cat_title'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new AS_Dbconn();
				
				$cat_cards = $database->get_results( $my_cat_cards_query );
				foreach( $cat_cards as $row )
				{
					echo '<div class="product menu-category">
									
					<a href="'.my_siteLynk().$row['card_slug'].'"><div class="product-image">
						<img class="product-image menu-card list-group-card" src="'.my_siteLynk_img().$row['card_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['card_slug'].'" class="menu-card list-group-card">'.substr($row['card_title'],0,20).'<span class="badge">KSh '.$row['card_price'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_cat_cards(){
	$my_db_query = "SELECT * FROM my_card LIMIT 4";
	$database = new AS_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-category">
				<a href="'.my_siteLynk().$row['card_slug'].'"><div class="menu-category-name list-group-card active">'.my_card_cart($row['card_cat']).'</div></a>
				<a href="'.my_siteLynk().$row['card_slug'].'"><div class="product-image">
					<img class="product-image menu-card list-group-card" src="'.my_siteLynk_img().$row['card_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['card_slug'].'" class="menu-card list-group-card">'.substr($row['card_title'],0,20).'<span class="badge">KSh '.$row['card_price'].'</span></a>

			</div>';
	}

			
	}

	function my_home_categories(){
		$my_db_query = "SELECT * FROM my_category LIMIT 9";
		$database = new AS_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['cat_slug'].'" >
			<div class="cat_lynk"><img class="cat_icon" src="'.my_siteLynk_icon().$row['cat_icon'].'"/>
			'.$row['cat_title'].'</div></a>';
	   }				
	}

	function my_lookup_cat($request){
		$my_db_query = "SELECT * FROM my_category WHERE cat_slug = '$request'";
		$database = new AS_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_user($request){
		$my_db_query = "SELECT * FROM my_user_account WHERE user_name = '$request'";
		$database = new AS_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_loc($request){
		$my_db_query = "SELECT * FROM my_location WHERE slug = '$request'";
		$database = new AS_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_card($request){
		$my_db_query = "SELECT * FROM my_card WHERE card_slug = '$request'";
		$database = new AS_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
