<?php

if($data[0] == "errorin") {
    echo "<script language='JavaScript'>";
	echo "alert('你不應該來這呦!!!');location.href='../index/index';";
	echo "</script>";
}

?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>文章預覽</title>
    <link rel="stylesheet" type="text/css" href="../views/css/page_inside.css">
    <link rel="stylesheet" href="../views/js/jquery.mobile-1.3.2/jquery.mobile-1.3.2.min.css" />
    <script src="../views/js/jquery-1.9.1.min/jquery-1.9.1.min.js"></script>
    <script src="../views/js/jquery.mobile-1.3.2/jquery.mobile-1.3.2.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <!--googlemap搜尋程式導向-->
    <script type="text/javascript" src="../views/js/googlemapset.js"></script>
    <script type="text/javascript">
    	$(document).ready(function() {
			getMapadress($("#address_X").val(),$("#address_Y").val());
		});
    </script>
</head>

<body>
	<div id = "preview_item">
		預覽文章<br>
		<form data-ajax="false" method="post" enctype="multipart/form-data"> 
			<div id = "preview_item_button_left">
				<input type="submit" id = "button_send" name = "button_send" value="確認送出">
			</div>
			<div id = "preview_item_button_right">
				<input type="submit" id = "button_repair" name = "button_repair" value="修改" style = "top:5% ; right: 30%">
			</div>
		</form>
	</div>
	<div id = "backnumber" style = "display:none;">
		<textarea id = "address_X" name = "address_X"><?php echo $data[1][2] ; ?></textarea>
        <textarea id = "address_Y" name = "address_Y"><?php echo $data[1][3] ; ?></textarea>
	</div>
	<div id = "whiteback">
	    <div id = "background" style = "margin: 3% auto ;">
	        <div id = "title">
	            <?php echo $data[1][5] ; ?>
	        </div>
	        <div><br></div>
	        <div id = "image">
	            <?php if($data[1][4] != ""): ?>
	            <img src="<?php echo '../views/upload/' . $data[1][4] ?>">
	            <?php endif ?>
	        </div>
	        <div id = "article_inside">
	            <?php echo $data[1][6] ; ?>
	        </div>
	        <div id = "map_address"><br><br><br>
	        	<p class = "map_address_title">這地方在哪裡呢!!!?<br></p>
	            <?php echo $data[1][1] ; ?>
	        </div>
        	<?php if($data[1][1] != ""): ?>
            <div id="googleMap" style="width: 50%; height: 400px; margin: 0 5% 10% 5%;"></div>
            <?php endif ?>
	    </div>
    </div>
</body>

</html>
