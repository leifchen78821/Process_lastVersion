<html>
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	    <title><?php echo $data[1]["Title"]?></title>
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
	    
	    <link rel="stylesheet" href="../view/js/jquery.mobile-1.3.2/jquery.mobile-1.3.2.min.css" />
		<script src="../view/js/jquery-1.9.1.min/jquery-1.9.1.min.js"></script>
		<script src="../view/js/jquery.mobile-1.3.2/jquery.mobile-1.3.2.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	    
	</head>
	<body>
	    <div><a href = "../page_<?php echo $_SESSION['state'] ;?>/page_<?php echo $_SESSION['state'] ;?>" data-ajax="false" ><img class = "lastpage" src="../views/img/lastpage.png"></a></div>
		<!--讀取資料XY軸 暫存於此-->
		<div id = "backnumber" style = "display:none;">
			<textarea id = "address_X" name = "address_X"><?php echo $data[1]["Map_X"] ; ?></textarea>
	        <textarea id = "address_Y" name = "address_Y"><?php echo $data[1]["Map_Y"] ; ?></textarea>
		</div>
		<div>
	        <p align="right" style="color : black ; font-family:Microsoft JhengHei;"><?php echo "您好阿  " . $data[0] . "  大大<br>" ?>
	            <?php if ($data[0] == "訪客"): ?>
	                <span style="" align="center" valign="baseline"><a href="../login/login" data-ajax="false">不是訪客? 點此登入<br></a>
	            <?php else: ?>
	                <span style="" valign="baseline"><a href="../article/article?ArticleID=<?php echo $_GET["ArticleID"] ; ?>&logout=1" data-ajax="false">登出<br></a>
	            <?php endif; ?>
	        </p>
	    </div>
		<div id = "whiteback">
			<div id = "background">
		        <div id = "title">
		            <?php echo $data[1]["Title"] ; ?>
		        </div>
		        <div id = "image">
		            <?php if($data[1]["ImageSite"] != ''): ?>
		            <img src="../views/upload/<?php echo $data[1]["ImageSite"] ?>">
		            <?php endif ?>
		        </div>
		        <div id = "article_inside">
		            <?php echo $data[1]["Article"] ; ?>
		        </div>
		        <div id = "map_address"><br><br><br>
		        	<p class = "map_address_title">這地方在哪裡呢!!!?<br></p>
		            <?php echo $data[1]["MapSite"] ; ?>
		            <br><br><br><br><br>分享時間 : 
		            <?php echo $data[1]["Time"] ?>
		            <br><br>發文者 : 
		            <?php echo $data[1]["Name"] ?>
		        </div>
	        	<?php if($data[1]["MapSite"] != ""): ?>
	            <div id="googleMap" style="width: 50%; height: 400px; margin: 0 5% 10% 5%;"></div>
	            <?php endif ?>
		    </div>
		    <div id = "message_send">
		    	<br><span style="font-size:18px">　我要留言:</span><br>
		    	<form data-ajax="false" id="form_send" name="form_send" method="post">
		    	<textarea placeholder="寫下你對這篇文章的高見吧!!" name="message_send_in" id="message_send_in" rows="10" cols="80"></textarea>
		    		<div id = "send_img">
			    		<input type="submit" id="send_message" name="send_message" value = "送出"/>
			    	</div>	
		    	</form>
		    </div>
		    
		    <?php while ($MessageRow = mysql_fetch_assoc($data[2])): ?>
			<div class = "message">
				<div style = "margin:5px auto;">
		            <div style= "float: left ; font-size:20px" >
		            	<span>　　</sapn><?php echo $MessageRow["Name"] ;?> <span>　在　</spane>
		            </div>
		            <div style= "float: left ; font-size:20px">
		            	<?php echo $MessageRow["Time"] ;?> <span>　時說...</span>
		            </div>
	            </div>
	            <br><br>
	            <div style="margin: 0 0 0 5% ; font-size:25px">
	            	<?php echo $MessageRow["MessageSent"] ;?>
	            </div>
	        </div>
	        <?php endwhile ?>
		</div>
	</body>
</html>
