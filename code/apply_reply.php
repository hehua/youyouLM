<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php 
    include 'manage/administrator_list.php';
    session_start();
    $ad_id = $_SESSION['eid'];
    $password = $_SESSION['password'];

    $ad_list = new administrator_list();
    if( ! $ad_list->check_high_account($ad_id,$password) )
    {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>     
<meta   http-equiv=refresh   content= '1; url=index.html'>
<link rel="stylesheet" type="text/css" href="logining.css" />
<link rel="stylesheet" type="text/css" href="css/admin.css" />
<title>登陆中</title>
</head>
<body style="background-colorL:gray;">
<span>  账号或密码错误，请重新登录</span>

</body>
</html>
<?php }
     else{
     	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/Login.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/newsadmin.css" />
<link rel="stylesheet" type="text/css" href="css/public.css" />
<title>东校区图书馆助理管理平台</title>
</head>
<body >


<div class="banner">
     <div class="banner_center">
        <span class="head1">东校区图书馆助理管理平台</span><br>
     </div>
</div>


<div class="daohang">
     <div class="daohang_center">
        <span  id="daohang_a"> <a href="admin.php">首 页</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="inform_admin.php">通知管理</a></span>      
       <span class="daohang_words" id="daohang_a"> <a href="news_admin.php">公告管理</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="apply_single.php?name=0">请假处理</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="knows_admin.php">图书馆手册</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="">退出</a></span>
     </div>
</div>
<?php 
     $mytitle = $_SESSION['title'];
     $mye_id = $_SESSION['mye_id'];
     $mytime  = $_SESSION['time'];
     $_SESSION['title'] = $mytitle;
     $_SESSION['time'] = $mytime;
     $_SESSION['mye_id'] = $mye_id;
     
     include 'manage/informlist.php';
     include 'manage/employ_list.php';
     $elist = new employ_list();
     $ename = $elist ->get_eploy_name($mye_id);
?>
<div class="content">
       <div class="newsform">
       <form  method="post" action="apply_reply_yes.php">
           <span class="newsform_title">请假回复</span><br>
           <span class="choicel">标题:</span><input class="search_text" name="title" type="text"  value="<?php echo '回复-'.$mytitle?>"/><br>
           
           <span class="choicel">对象:</span>
           <input class="search_text" name="eid" type="text"  value="<?php echo $ename?>"/><br>
           <?php 
           
           ?>
          
           
           <span class="choicel">通知内容:</span><br/><textarea id="resume" name="content" rows="18" cols="65"></textarea><br>
           <input  type="submit" value="回复"/>
           <input type="reset" name="reset" value="重置"/>
        </form>
      </div>
       
       
</div>

 </body>
 </html> 



<?php 
     }
?>
  


