<?php

if($data[3] == "errorin") {
    echo "<script language='JavaScript'>";
    echo "alert('你不應該來這呦!!!');location.href='../connect4site/connect4site';";
    echo "</script>";
}
elseif($data[3] == "delete") {
    echo "<script language='JavaScript'>";
    echo "alert('你不應該來這呦!!!');location.href='../connect4site/connect4site';";
    echo "</script>";
}
?>
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>逢甲大玩客 - <?php echo $_GET["choose"] ; ?></title>
      <link rel="stylesheet" type="text/css" href="../views/css/member.css">
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
        <br>
        <div id = "backgroundmember">
            <?php if($_GET["choose"] == "1"): ?>
            <img class = "front_pic_member" src="../views/img/member01.png">
            <div id = "member01" style = "background-image: url(../views/img/memberback.png);">
                <div id = "member01_1">
                    帳號 : <?php echo $data[0]["Name"] ?><br><br>
                    <form data-ajax="false" id="form1" name="form1" method="post">密碼 :　
                                <input type="submit" name="button_changePassword" id="button_changePassword" value="修改密碼" />
                           </form>
                    性別 : <?php if($data[0]["Gender"] == 1) : ?>
                            紳士
                           <?php else : ?>
                            淑女
                           <?php endif ?>
                            <br><br>
                    電話 : <?php echo $data[0]["PhoneNumber"] ?><br>
                </div>
            </div>
            <?php elseif($_GET["choose"] == "2"): ?>
            <img class = "front_pic_member" src="../views/img/member02.png">
            <div id = "member02" style = "background-image: url(../views/img/memberback.png);">
                <div id = "member02_1">
                    <div style="clear:both;"></div>
                    <?php foreach ($data[1] as $row02): ?>
                    <div style = "width:100% ; border-bottom: 2px solid gray ; border-radius:5%; float:left ;">
                        <br>
                        發布時間 : <?php echo $row02["Time"] ?><br>
                        版別 : <?php if($row02["State"] == "food") : ?>
                                食
                               <?php else : ?>
                                衣
                               <?php endif ?><br>
                        標題 : <?php echo $row02["Title"] ?><br>
                        <br>
                        <a href = "../article/article?ArticleID=<?php echo $row02["uID"]?>"><div id = "pic_go"><img src="../views/img/go.gif" width="100" >前去看看</div></a>
                        <a href = "../update/update?ArticleID=<?php echo $row02["uID"]?>"><div id = "pic_go"><img src="../views/img/changearticle.gif" width="100"  >修改文章</div></a>
                        <div id = "pic_go"><button id = "deletebut" name = "deletebut" type = "button" onclick = "click_delete(<?php echo $row02["uID"] ?>)"><img src="../views/img/delete.gif" width="100"  >刪除文章</button></div>
                    </div>
                    <?php endforeach ?>
                    <div style="clear:both;"></div>
                </div>
            </div>
            <?php else: ?>
            <img class = "front_pic_member" src="../views/img/member03.png">
                    <div id = "member03" style = "background-image: url(../views/img/memberback.png);">
                <div id = "member03_1">
                    <div style="clear:both;"></div>
                    <!--利用$i來進行陣列遞增判定-->
                    <?php foreach ($data[2] as $row03): ?>
                    <div style = "width:100% ; border-bottom: 2px solid gray ; border-radius:5%; float:left ;">
                        <br>
                        發布時間 : <?php echo $row03[0] ?><br>
                        版別 : <?php if($row03[4] == "food") : ?>
                                食
                               <?php else : ?>
                                衣
                               <?php endif ?><br>
                        留言文章 : <?php echo $row03[3] ?><br>
                        留言內容 : <?php echo $row03[2] ?><br>
                        <br>
                        <a href = "../article/article?ArticleID=<?php echo $row03[1] ?>"><div id = "pic_go"><img src="../views/img/go.gif">前去看看</div></a>
                    </div>
                    <?php $i++ ;?>
                    <?php endforeach ?>
                    <div style="clear:both;"></div>
                </div>
            </div>
            <?php endif ?>
        </div>
            <script>
                function click_delete(id) {
                    if(confirm('確定刪除?(資料將無法回復)')) {
                        location.href = '../member/member?choose=2&delete=' + id ;
                    }
                }
            </script>
    </body>
</html>