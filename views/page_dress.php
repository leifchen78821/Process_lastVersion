<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>逢甲大玩客 - 買衣看這邊</title>
      <link rel="stylesheet" type="text/css" href="../views/css/page.css">
    </head>
    <body>
        <ul class="drop-down-menu">
            <li><p>其他去處　</p>
                <ul>
                    <li><a href="../connect4site/connect4site">標題</a>
                    </li>
                    <li><a href="../page_food/page_food">食</a>
                    </li>
                    <li><a href="../page_dress/page_dress">衣</a>
                    </li>
                    <li><a onclick="return confirm('即將外連至其他網頁，是否確認前往?');" href="http://www.trivago.com.tw/?cpt=324044602&r=&iRoomType=7&aHotelTestClassifier=&iIncludeAll=0&iGeoDistanceLimit=20000&aPartner=&iGeoDistanceItem=3240446&iPathId=408051&aDateRange%5Barr%5D=2016-07-24&aDateRange%5Bdep%5D=2016-07-25&iViewType=0&bIsSeoPage=false&bIsSitemap=false&">住</a>
                    </li>
                    <li><a onclick="return confirm('即將外連至其他網頁，是否確認前往?');" href="http://citybus.taichung.gov.tw/iTravel/">行</a>
                    </li>
                </ul>
            </li>
            <?php if($data[0] == "訪客") : ?>
            <?php else: ?>
            <li><p>　會員專區　</p>
                <ul>
                    <li><a href="../member/member?choose=1">帳號管理</a>
                    </li>
                    <li><a href="../member/member?choose=2">文章管理</a>
                    </li>
                    <li><a href="../member/member?choose=3">留言管理</a>
                    </li>
                </ul>
            </li>
            <?php endif ?>
        </ul>
        <div>
            <p align="right" style="color : black ; font-family:Microsoft JhengHei;"><?php echo "您好阿  " . $data[0] . "  大大<br>" ?>
                <?php if ($data[0] == "訪客"): ?>
                    <span style="" align="center" valign="baseline"><a href="../login/login">不是訪客? 點此登入<br></a>
                <?php else: ?>
                    <span style="" valign="baseline"><a href="../page_dress/page_dress?logout=1">登出<br></a>
                <?php endif; ?>
            </p>
        </div>
        
        <div>
            <img class = "front_pic" src="../views/img/dress_front.png">
            <br>
            <form data-ajax="false" id="form1" name="form1" method="post">
            <input type="submit" class="button_page" name="IssuedArticle" id="IssuedArticle" value="我要發文" />
            </form>
            <br>
            <br>
        </div>
        
        <div id = "page_index">

            <?php foreach ($data[1] as $rows): ?>
            <a href = "../article/article?ArticleID=<?php echo $rows["uID"]?>">
                <div class="portfolio-box portfolio-box-container content_box">
                    <?php if( $rows["ImageSite"] != '' ): ?>
                	<img src="../views/upload/<?php echo $rows["ImageSite"] ?>" style="width:300px">
                	<?php else: ?>
                	<img src="../views/img/dress_front.png" style="width:300px">
                	<?php endif ?>
                	 <h3><?php echo $rows["Title"] ?></h3>
                	 <p><?php echo mb_substr( $rows["Article"],0,50,"utf-8"); ?>...</p>
                </div>

            <?php endforeach ?>
        </div>
    </body>
</html>