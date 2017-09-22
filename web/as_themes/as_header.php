<?php
   echo 
'<?xml version="1.0" encoding="utf-8"?>';
        $pageTitle = isset( $results['pageTitle'] ) ? $results['pageTitle'] : AS_get_option('sitename');
        $pageDescription = isset( $results['pageDescription'] ) ? $results['pageDescription'] : "";
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
			<meta charset="utf-8">
		<title><?php echo $pageTitle ?></title>
		<meta name="copyright" content="Jackson Siro"/>
		<style type="text/css">
/*<![CDATA[*/.bh{padding:6px;}.b .bi{padding:2px 4px;}.cc{border-color:#9197a3;box-sizing:border-box;width:100%;}.cc.cd{margin-top:6px;}.cf{padding-left:4px;}.cg{margin-top:4px;}.ea{background:#f6f7f8;}.f{background:#dcdee3;}.cu{background:#fff;}form{margin:0;border:0;}.bj{color:#4e5665;font-size:12px;white-space:nowrap;}.bk{background-color:#fff;border:0;display:inline-block;height:26px;line-height:26px;margin:0;padding-right:16px;position:relative;vertical-align:top;white-space:nowrap;}.bk input,.bk button{color:#eee;}
.bk a:hover{color:#000;}
.bk.bl,.bp.bl{height:20px;line-height:20px;} .color_codes{width: 150px;}
.bp{-moz-appearance:none;background-color:#fff;border:none;color:#4e5665;display:inline-block;font-size:12px;height:26px;min-width:100%;padding:0;vertical-align:top;}
.bk a.bp{color:#4e5665;}.bn{background-color:#dcdee3;}.bn .bp{background-color:#dcdee3;}.bq{background-image:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/y7/r/Gm9JuAvZCI7.png);background-position:right center;background-repeat:no-repeat;bottom:0;display:block;pointer-events:none;position:absolute;right:0;top:0;width:26px;}
.bn .bq{background-image:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yX/r/sWcQ_CU4eu2.png);}.dl{color:#4e5665;}.dlx{color:#000;font-weight:normal;} .eh{font-size:12px;line-height:16px;}.ef{font-size:14px;line-height:20px;}.dz{font-weight:normal;}.dm{font-weight:bold;}.bo{text-align:left;}.b .m{border:0;border-collapse:collapse;margin:0;padding:0;width:100%;}.b .m.cl{width:auto;}.b .m tbody,.b .br>tr>td,.b .br>tbody>tr>td,.b .m td.br{vertical-align:top;}.b .bz>tr>td,.b .bz>tbody>tr>td,.b .m td.bz{vertical-align:middle;}.b .m td{padding:0;}.b .m td.v{padding:2px;}.b .m td.eb{padding:4px;}.b .s{width:100%;}.bs .fs{height:24px;line-height:24px;margin-left:2px;}.bv{background:#fff;}.bs .ce{background-color:transparent;color:#4e5665;display:block;padding:0;width:100%;}.bw .img{display:block;}.bs .bu .fr{padding:2px;}.bs .bu .bw{padding:4px;}.b .bs .bu{border:1px solid #9197a3;}.b a,.b a:visited{color:#303f9f;text-decoration:none;}.b .es,.b .es:visited{color:gray;}.b .bc,.b .bc:visited{color:#fff;font-size:18px;}.b a:focus,.b a:hover,.b .es:focus,.b .es:hover{background-color:#eee;color:#fff;}.b .bc:focus,.b .bc:hover{background-color:#fff;color:#eee;}.bx{background:#eceff5;}.ca{-moz-appearance:none;border:0;margin:0;padding:0;}.y{-moz-appearance:none;background:none;display:inline-block;font-size:12px;height:28px;line-height:28px;margin:0;overflow:visible;padding:0 9px;text-align:center;vertical-align:top;white-space:nowrap;}.b .y{border-radius:2px;}.ba,a.ba,html .b a.ba{color:#fff;}.b .ba{background-color:#eee;border:1px solid #385490;}.b a.ba:hover,.b .ba:hover{background-color:#465e91;}.ba[disabled]{color:#899bc1;}.b .ba[disabled]:hover{background-color:#eee;}.b a.y::after{content:"";display:inline-block;height:100%;vertical-align:middle;}.b .y{padding:0 8px;}.b a.y{height:26px;line-height:26px;}
.ch{display:inline-block;}.cj{color:gray;}.ci{font-size:small;}
body,tr,input,textarea,.g{font-size:medium;}.ck{display:inline-block;}.ck .cq{display:block;font-size:small;white-space:normal;}
.cm,.cn.img{cursor:pointer;display:block;}.b .cn{padding:2px;}.b .ck a.cq,.ck .cq{color:#4e5665;font-weight:bold;text-align:left;}
.mysubmith{font-size:30px;padding:5px;background:#eee;}
.b .ck a.cq:hover,.b .ck a.cq:focus,.ck .cq:hover,.ck .cq:focus{background:#4e5665;color:#fff;}
.b .ck a.cm:hover,.b .ck a.cm:focus,.ck .cm:hover,.ck .cm:focus{background:inherit;}.b .fp{padding:0;}.b .v{padding:2px;}
.b .eb{padding:4px;}.img{border:0;display:inline-block;vertical-align:top;}
i.img u{position:absolute;width:0;height:0;overflow:hidden;}.cp{-moz-appearance:none;background-color:transparent;border:0;display:inline;font-size:inherit;margin:0;padding:0;}.cp:hover{background-color:#eee;color:#fff;white-space:normal;}.cr{color:#eee;}.ez{background:#e9eaed;border-top:1px solid #d0d1d5;font-size:small;padding:0 8px 4px;}.fa{border-bottom:1px solid #d0d1d5;margin:0 -8px 3px -8px;padding:8px;}.fa .fd{display:inline-block;margin:-1px -4px -1px -4px;padding:1px 4px 1px 4px;}.fd.fc{display:block;font-size:medium;font-weight:bold;}.fb{background:white;border:1px solid #bdc1c9;display:block;margin-right:4px;padding:2px;}
#h{background: #303f9f;}
.b .fa .fb:hover{background:white;}.fd{display:block;font-size:small;margin-left:-4px;padding:3px 0 3px 4px;}.b a.fd,.b a.fd:visited{color:#141823;}.b a.fd:focus,.b a.fd:hover{background:#141823;color:#e9eaed;}.ct,.ct tr{font-size:small;}.df{display:block;font-weight:bold;padding:6px 3px;text-align:center;}.b .df{background-color:#f6f7f8;border:0;padding:4px;text-align:left;}.b .cz.cz{background:white;}.b .cz{border-bottom:1px solid #e5e5e5;}.b .ct.ct>:first-child{margin-top:-1px;}.cs{border-bottom:1px solid transparent;border-top:1px solid transparent;}.b .cs>*{margin:6px;}.b .cs>:first-child{margin-top:5px;}.b .cs>:last-child{margin-bottom:5px;}.cv{border-color:#000; border-style:solid;border-width:1px;}.cw{border-bottom:1px solid #e5e5e5;}.dd{display:block;font-size:small;}.cw:last-child{border-bottom:none;}.db{width:16px;}.dd .dc{font-size:small;}.cx{background:#eceff5;}.de{white-space:nowrap;}.b .dd:hover,.b .dd:focus{background:#d1e9ff;color:#eee;}.b .dd,.b .dd:visited,.b .dd:active{background:transparent;color:#141823;text-decoration:none;}.cy .dd,.cy .dd:visited,.cy .dd:active{margin:-2px -2px -2px -22px;min-height:16px;padding:2px 2px 2px 22px;}.da,.da:hover,.da:active,.da:visited{background:transparent;}.da>.img{display:block;}.b .eu{border-bottom:0;border-top:1px solid #fff;font-size:small;font-weight:bold;text-align:center;}.b .eu a,.b .eu a:visited{color:#E41B17;}.b .eu a:hover,.b .eu a:focus{background:#E41B17;color:#fff;}.i{background-color:#eee;}.ev{background-color:#f2f2f2;}.j{padding:2px 3px;}.ew{padding:4px 3px;}.ex{border-top:1px solid;}.ey{border-bottom:1px solid;}.i{border-color:#008000;}.ev{border-color:#ccc;}.dk{margin:0 6px 6px;padding:6px;} a dk{color:#fff;}
.b .dk .dk{border-color:#e9eaed;margin:6px 0 0;}.dv{display:inline-block;}.du{margin-top:5px;}.dn,.do{margin:5px 0;}.dk a,.dk a:visited{color:#E41B17;}.dk a:hover,.dk a:focus{background:#E41B17;color:#fff;}.dj{font-size:small;}.dh{list-style:none;margin:0;padding:0;}.dr{position:relative;}.dr:after{border:1px solid rgba(0, 0, 0, .1);bottom:0;content:'';left:0;position:absolute;right:0;top:0;}.dp .ds{background:#f2f2f2;display:inline-block;margin:0 3px 3px 0;}.dp .ds.dt{margin-right:0;}._52h1{margin-right:3px;vertical-align:-2px;}.eo{overflow:hidden;position:relative;}html .eq.eq{display:block;position:absolute;}.eq:after{border:1px solid rgba(0, 0, 0, .1);bottom:0;content:'';left:0;position:absolute;right:0;top:0;}.er{background:#f2f2f2;}.ep:hover .er{background:none;}.en{position:absolute;visibility:hidden;}.ec{border:1px solid #ccc;margin:5px 0;word-wrap:break-word;}.b .ec .ee{padding-right:4px;}.ed{display:block;}.b .ed,.b .ed:visited{color:#3e4350;}.b .ed:focus,.b .ed:hover,.b .ed:focus .ec,.b .ed:hover .ec{background:#eee;color:#fff;}.dj .eg{font-size:small;}.img.dy{margin-right:3px;vertical-align:baseline;}.dx{white-space:nowrap;}.ej{margin-right:8px;text-align:right;}.ek{height:6px;}
.el{border:1px solid #3974e0;font-size:small;margin-top:-1px;padding:7px;}.em{background:#5890ff;color:#fff;}.word_break{display:inline-block;}
h1{font-size:20px;} h1 a{font-size:20px;} textarea{min-height:200px;}
body{text-align:left;direction:ltr;}body,tr,input,textarea,button{font-family:sans-serif;}body,p,figure,h1,h2,h3,h4,h5,h6,ul,ol,li,dl,dd,dt{margin:0;padding:0;}h1,h2,h3,h4,h5,h6{font-size:1.2em; font-weight:bold;}ul,ol{list-style:none;}
article,aside,figcaption,figure,footer,header,nav,section{display:block;}.e #viewport{margin:0 auto;max-width:600px;}#page{position:relative;}.fl{font-size:small;padding:7px 8px 8px;}.ft{display:block;margin-top:8px;padding:2px;text-align:center;}.fj{display:block;font-size:x-small;margin:-3px -3px 1px -3px;padding:3px;}.b .fl td.fh{padding-right:4px;}.b .fl td.fk{padding-left:4px;}.fl.fm{background-color:#4e5665;}.fm{border-top:1px solid #373e4d;color:#bdc1c9;}.fm .ft{border:1px solid #bdc1c9;color:#bdc1c9;}.b .fm a,.b .fm a:visited,.b .fg a,.b .fg a:visited{color:#bdc1c9;}.b .fm a:focus,.b .fm a:hover,.b .fg a:focus,.b .fg a:hover{background:#dcdee3;color:#141823;}.fm .ft:focus,.fm .ft:hover{background:#dcdee3;border:1px solid #dcdee3;color:#141823;}.fn{margin-bottom:8px;}.fl.fm .fn>
.fq{background:#d3d7dc;}.fe{background-color:#373e4d;font-size:x-small;padding:7px 8px 8px;}.fi{color:#bdc1c9;display:block;font-size:x-small;margin:-3px -3px 1px -3px;padding:3px;}.u{border:0;display:block;margin:0;padding:0;}.r,.r.img{display:block;}.o{display:block;}.p{height:40px;width:40px;}.k{background:#eee;padding:0 4px 4px;height:40px;}.k.k .w{background:#fff;border:1px solid #243872;box-sizing:border-box;font-size:25px;height:40px;margin:0;padding:5px;width:100%;}.l.k{padding:1px 1px 3px;}.k .q{padding:1px 3px 0 0;}.k.k.k .z{background:#000;border:1px solid #2e417e;color:#fff;font-size:25px;font-weight:normal;margin-left:3px;height:40px;line-height:20px;}.bb{padding-bottom:1px;}.bd{display:inline-block;font-size:small;padding:2px 4px 2px;}.bf{color:#fff496;}.b a:hover .bf,.b a:focus .bf,.bd:hover .bf,.bd:focus .bf{color:#eee;}.bd.be{background-color:#008000;}
.input_box,.input_post,.textarea_post,.post_this{width:90%;color:#000;font-size:20px;padding:5px;margin:5px;}
.mysubmith{font-size:25px;}
.error{padding: 5px;background: #f0c6c3 none repeat scroll 0% 0%;margin-left: 6px;margin-right: 6px;margin-bottom: 6px;border: 1px solid #cc6622;list-style: outside none none;}
.tj_card{padding: 5px;background: #FFF none repeat scroll 0% 0%;margin-left: 6px;margin-right: 6px;margin-bottom: 6px;border: 1px solid #555;list-style: outside none none; font-size:18px;}
.tj_card_a{color: #000;}
.my_home_link:{color:#ff0;width:40%;font-size:50px;font-weight:bold;text-align:center; }
lable{font-size:25px; }
.tj_card_duo{padding: 5px;background: #FFF none repeat scroll 0% 0%;margin-left: 6px;margin-right: 6px;margin-bottom: 6px;border: 1px solid #555;list-style: outside none none;width:45%;display:inline-block;}
.input_card, .select_card, .file_card{width:95%;font-size:22px;padding:5px;margin: 5px 5px;} 
.page_name{font-size: 22px;}
.mysubmith{font-size:22px;padding:5px;margin: 5px 5px; background: #303f9f; color: #fff;}
.navi{font-size: 22px;} .iconic{height: 50px; width: 50px; border-radius: 25px;}
.nowrap{text-overflow:ellipsis;overflow:hidden;white-space: nowrap;max-width:450px;}
.tt_tb {   width: 100%; border-bottom: #000;}  .tt_tb tr, .tt_tb th, .tt_tb td {   padding: 5px;   margin: 0;   text-align: left; }  .tt_tb, .tt_tb th {   border: 1px solid #fff; }  .tt_tb th {   border-left: none;   border-right: none;   background: #303f9f;   color: #fff;   cursor: default;   text-shadow: 1px 1px #000; }  .tt_tb tr {  }.tt_tb tr:hover {   background: #ddd;   cursor: pointer; }
/*]]>
*/</style>
	</head>
	
	<body tabindex="0" class="b c d e f">
		<div class="g">
		<div id="viewport">
		<div class="h">
		<div class="i j" id="header" style="background: #303f9f;">
		<h3 style="text-transform:uppercase;text-align: center;font-size: 30px;"><?php echo AS_get_option('sitename') ?></h3>		
		<div class="bb navi"><center>
				<?php 
		$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
		if ($myaccount){ ?>
		<a class="bc bd" href="index.php?action=category_all">Categories</a>
		<a class="bc bd" href="index.php?action=card_all">Fun Cards</a>
		<a class="bc bd" href="index.php?action=user_all">Members</a>
		<a class="bc bd" href="index.php?action=options">Site Options</a>
		<a class="bc bd" href="index.php?action=logout">Logout?</a>
	
		<?php }  else { ?>
		<a class="bc bd" href="index.php">Home</a>
		<a class="bc bd" href="index.php?action=register">Register</a>
		<a class="bc bd" href="index.php?action=forgot_password">Forgot Password</a>
		<a class="bc bd" href="index.php?action=forgot_username">Forgot Username</a>
		
		<?php }	?>
		
		</center>
		</div>
		</div>
		
		<div  style="margin-bottom:10px;" ></div>
		<div id="m_newsfeed_stream">
		<div class="dg"></div>
		<div id="m-top-of-feed"></div><div class="dh di dj">
		
