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
<title>��½��</title>
</head>
<body style="background-colorL:gray;">
<span>  �˺Ż�������������µ�¼</span>

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
<title>��У��ͼ����������ƽ̨</title>
</head>
<body >


<div class="banner">
     <div class="banner_center">
        <span class="head1">��У��ͼ����������ƽ̨</span><br>
     </div>
</div>


<div class="daohang">
     <div class="daohang_center">
        <span  id="daohang_a"> <a href="admin.php">�� ҳ</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="inform_admin.php">֪ͨ����</a></span>      
       <span class="daohang_words" id="daohang_a"> <a href="news_admin.php">�������</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="apply_single.php?name=0">��ٴ���</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="knows_admin.php">ͼ����ֲ�</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="">�˳�</a></span>
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
           <span class="newsform_title">��ٻظ�</span><br>
           <span class="choicel">����:</span><input class="search_text" name="title" type="text"  value="<?php echo '�ظ�-'.$mytitle?>"/><br>
           
           <span class="choicel">����:</span>
           <input class="search_text" name="eid" type="text"  value="<?php echo $ename?>"/><br>
           <?php 
           
           ?>
          
           
           <span class="choicel">֪ͨ����:</span><br/><textarea id="resume" name="content" rows="18" cols="65"></textarea><br>
           <input  type="submit" value="�ظ�"/>
           <input type="reset" name="reset" value="����"/>
        </form>
      </div>
       
       
</div>

 </body>
 </html> 



<?php 
     }
?>
  


