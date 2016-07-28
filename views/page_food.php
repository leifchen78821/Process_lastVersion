<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>逢甲大玩客 - 吃貨看這邊</title>
      <link rel="stylesheet" type="text/css" href="../views/css/page.css">
	  <script src="../views/js/jquery.mobile-1.3.2/jquery.mobile-1.3.2.min.js"></script>
    </head>
    <body>
        <div id="FAD_Div" style="position:absolute;">
            <div style = "background-color: yellow ; width: 300px ; height: 300px ; z-index : 2147483647 ;">
                
            </div>
            <input type="textarea" name=""/>
        </div>
        <div id = "moveli">
            <img id = "moveli_pic" src="../views/img/play.png">
            <div>
                <ul class="drop-down-menu" id = "move_01">
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
                </ul>
                <ul class="drop-down-menu" id = "move_02">
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
                </ul>
                <ul class="drop-down-menu" id = "move_03">
                    <li><p>　好友互動　</p>
                        <ul>
                            <li><a>好友邀請</a>
                            
                            </li>
                            <li><a href="../member/member?choose=2">接受好友</a>
                            
                            </li>
                            <li><a href="../member/member?choose=3">好友列表</a>
                                <ul style = "height:400px;overflow:auto;">
                                    <?php foreach($data[2] as $friendsrows): ?>
                                    <li>
                                        <a><?php echo $friendsrows["Name"] ;?></a>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
        <div>
            <p align="right" style="color : black ; font-family:Microsoft JhengHei;"><?php echo "您好阿  " . $data[0] . "  大大<br>" ?>
                <?php if ($data[0] == "訪客"): ?>
                    <span style="" align="center" valign="baseline"><a href="../login/login">不是訪客? 點此登入<br></a>
                <?php else: ?>
                    <span style="" valign="baseline"><a href="../page_food/page_food?logout=1">登出<br></a>
                <?php endif; ?>
            </p>
        </div>
        
        <div>
            <img class = "front_pic" src="../views/img/food_front.png">
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
                	<img src="../views/img/food_front.png" style="width:300px">
                	<?php endif ?>
                	 <h3><?php echo $rows["Title"] ?></h3>
                	 <p><?php echo mb_substr( $rows["Article"],0,50,"utf-8"); ?>...</p>
                </div>
            <?php endforeach ?>
        </div>
        
        <script type="text/javascript">

     // 省資源的右側浮動視窗 div
     // 特色：用較低的頻率檢測是否位移，若有位移才切換為高頻率移動模式
     // 　　　移動到定點之後，繼續變回靜止模式，省資源不LAG
     // By.Weberkk 2013 05 22  http://twnpc.com/
     
     // 右側浮動廣告寬度
     var FAD_Width = 185;
     var FAD_Style = document.getElementById('FAD_Div').style; 
 
     // 主要區塊大小 (廣告會置於主要區塊之右)
     var FAD_mainBlockWidth = 1014;
     var FAD_PaddingRight = 818;

     var FAD_PWidth = document.body.clientWidth;
     var FAD_Edge = (FAD_PWidth - FAD_mainBlockWidth) / 2;
     var FAD_LastPWidth = FAD_PWidth;

     // 廣告目標位置
     
     var FAD_X = FAD_Edge + FAD_PaddingRight;
     var FAD_Y = 202;
     
     var FAD_SetY = false;
     var FAD_ScrollY = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
     var FAD_LastScrollY = FAD_ScrollY;
     var FAD_TargetY = FAD_Y + FAD_ScrollY;
     
     // 廣告位置
     // var FAD_NowX = FAD_X;
     var FAD_NowY = FAD_TargetY;

     // 更新指定圖層之位置
         FAD_Style.left = FAD_X + 'px';
         FAD_Style.top = FAD_NowY + 'px';

     var FAD_N = 0;
     var FAD_Temp = 0;
     
     function FAD_ChackX() 
     {
         FAD_PWidth = document.body.clientWidth;
         if (FAD_PWidth < FAD_mainBlockWidth)
         {
         FAD_PWidth = FAD_mainBlockWidth
         }
         if (FAD_LastPWidth != FAD_PWidth)
         {
         FAD_LastPWidth = FAD_PWidth;
         FAD_Edge = (FAD_PWidth - FAD_mainBlockWidth) / 2;
         FAD_X = FAD_Edge + FAD_PaddingRight;
         FAD_Style.left = FAD_X + 'px';
         }
     }
     function FAD_ChackY() 
     {
         // 預防定義不同之設定
         FAD_ScrollY = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
         if (FAD_LastScrollY != FAD_ScrollY)
         {
         FAD_LastScrollY = FAD_ScrollY;
         FAD_TargetY = FAD_Y + FAD_ScrollY;
         FAD_SetY = true;
         }
     }

     function FAD_Fix() 
     {
        if ( FAD_Temp <= 3 ) {
        } else if ( FAD_Temp > 1250 ) {
        FAD_Temp = FAD_Temp - 1250        
        } else {
        FAD_Temp = FAD_Temp / 5
        }
     }

     // FloatAdRightRefresh: 更新視窗位置
     function FAD_Core() 
     {
      if (FAD_SetY) {
        //定期 chack Y
        if (FAD_N < 5) {
        FAD_N++
        } else {
        FAD_N=0
        FAD_ChackY();
        }
        //移動div Y
        FAD_Temp = (FAD_TargetY - FAD_NowY);
        if (FAD_Temp != 0) {
          if (FAD_Temp > 0) {
          FAD_Fix();
          } else {
          FAD_Temp = (0 - FAD_Temp);
          FAD_Fix();
          FAD_Temp = (0 - FAD_Temp);
          }
          FAD_NowY += FAD_Temp;
          FAD_Style.top = FAD_NowY + 'px';
          setTimeout('FAD_Core()', 15);
        } else {
          FAD_SetY = false;
          FAD_N=0
          setTimeout('FAD_Core()', 300);
        }
      } else {
        FAD_ChackX();
        FAD_ChackY();
        setTimeout('FAD_Core()', 300);
      }  
     }
 
     // ====== 啟動 =======
     FAD_Core();

 </script>
        
    </body>
</html>