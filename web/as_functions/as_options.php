<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	/*
	function AS_lang($){
		$fh = fopen('/path/file.php', 'r') or die($php_errormsg);
		while (!feof($fh)) {
			$line = fgets($fh, 4096);
			if (preg_match($pattern, $line)) {
				$ora_books[]=$line;
			}
		}
		fclose($fh);
	}*/
	
	function getColorText($string) {
		$color_text = explode("|", $string);
		return $color_text[0];
	}
	
	function AS_total_cat_story(){
		$AS_db_query = "SELECT * FROM my_story";
		$database = new AS_Dbconn();
		return $database->AS_num_rows( $AS_db_query );
	}
	
	function AS_cat_card($catid){
		$AS_db_query = "SELECT * FROM AS_category WHERE catid = '$catid'";
		$database = new AS_Dbconn();
		if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
			list( $catid, $cat_slug, $cat_title) = $database->get_row( $AS_db_query );
			return $cat_title;
		} else  {
			return false;
		}
	}