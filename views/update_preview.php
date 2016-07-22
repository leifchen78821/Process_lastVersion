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
		<textarea id = "address_X" name = "address_X"><?php echo $_SESSION['address_X'] ; ?></textarea>
        <textarea id = "address_Y" name = "address_Y"><?php echo $_SESSION['address_Y'] ; ?></textarea>
	</div>
	<div id = "whiteback">
	    <div id = "background" style = "margin: 3% auto ;">
	        <div id = "title">
	            <?php echo $_SESSION['title'] ; ?>
	        </div>
	        <div><?php echo $_SESSION['test'] ; ?><br></div>
	        <div id = "image">
	            <?php if($_SESSION['image'] != ""): ?>
	            <img src="<?php echo '../views/upload/' . $_SESSION['image'] ?>">
	            <?php endif ?>
	        </div>
	        <div id = "article_inside">
	            <?php echo $_SESSION['article'] ; ?>
	        </div>
	        <div id = "map_address"><br><br><br>
	        	<p class = "map_address_title">這地方在哪裡呢!!!?<br></p>
	            <?php echo $_SESSION['source'] ; ?>
	        </div>
        	<?php if($_SESSION['source'] != ""): ?>
            <div id="googleMap" style="width: 50%; height: 400px; margin: 0 5% 10% 5%;"></div>
            <?php endif ?>
	    </div>
    </div>
</body>

</html>
