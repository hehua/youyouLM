<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
  include 'manage/lb_list.php';
  $id = $_POST['id'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $list= new lb_list;
  if ( $list->add_lb($id,$password,$name,$address,$phone) )
  {
  	?>
    <html>
         <head>
           <meta   http-equiv=refresh   content= '1;url=register.html '>
		   <link rel="stylesheet" type="text/css" href="logining.css" />
		   <title>新建中。。。</title>
         </head>
         <body>
  	       <span class="error">账户名已经存在，请重新输入</span>  
  	     </body>
  	</html>
  	<?php 
  }
  
  else{
  	?>
    <html>
         <head>
           <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
		   <link rel="stylesheet" type="text/css" href="logining.css" />
		   <title>新建图书馆</title>
         </head>
         <body>
  	       <span class="success">恭喜你，新建图书馆成功</span>  <br></br>
  	       <span class="success">你的图书馆管理系统的地址为：</span>  <br></br>
  	       <a href="manage/data/lb_list/<?php echo $id?>">"manage/data/lb_list/<?php echo $id?>"</a>
  	     </body>
  	</html>
  	<?php 
  }
  ?>
   
