<?php 
	include AS_THEME."AS_header.php";
	$userid = isset( $_COOKIE['tujuane_userid'] ) ? $_COOKIE['tujuane_userid'] : "";
    echo '<section id="contact" ><div class="container"><div class="row">
			<div class="col-md-12 wow fadeInDown" data-wow-delay="2000"><br>
			<table class="body_wrap" style="100%"><tr><td class="main_section" valign="top"> 
			<div class="inner_wrap"><div class="success">'.AS_success_status().'</div>';
	
	echo '<center><div style="background: #999;">
		<table style="background: url(http://tujuane.net/AS_images/404.jpg);height:700px;width:100%;text-align:center;color:#fff;" />
		<tr><td>
		<p style="font-size:72px;">Error 404</p>
		<h1>The page you are looking for can\'t be found</h1><hr>
		<a href="'.AS_siteUrl().'"><h1>Go back home</h1></a></td></tr></table>
		</div></center>';
	
	echo '</div></td><td valign="top" class="side_section">';
	
	//AS_my_sidebar();
	
        echo '</td>';

	echo '</tr></table></div></div></div></section>';

	include AS_THEME."AS_footer.php" ?>

