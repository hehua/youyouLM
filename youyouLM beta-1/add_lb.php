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
		   <title>�½��С�����</title>
         </head>
         <body>
  	       <span class="error">�˻����Ѿ����ڣ�����������</span>  
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
		   <title>�½�ͼ���</title>
         </head>
         <body>
  	       <span class="success">��ϲ�㣬�½�ͼ��ݳɹ�</span>  <br></br>
  	       <span class="success">���ͼ��ݹ���ϵͳ�ĵ�ַΪ��</span>  <br></br>
  	       <a href="manage/data/lb_list/<?php echo $id?>">"manage/data/lb_list/<?php echo $id?>"</a>
  	     </body>
  	</html>
  	<?php 
  }
  ?>
   
