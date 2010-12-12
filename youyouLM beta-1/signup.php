<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
  include 'manage/lb_list.php';
  $id = $_POST['id'];
  $password = $_POST['password'];
  $list= new lb_list;
  $temp = $list->get_lb_by_id($id);
  if($temp!=NULL)
  {
  	if( $temp->getPassword()==$password)
  	{
  		session_start();
  		$_SESSION['id']=$id;
  		$_SESSION['code']=$password;
  	?>
  	<html>
          <head>
            <meta   http-equiv=refresh   content= '1;url=manage/data/lb_list/<?php echo $id ?>/admin.php '>
	 	    <link rel="stylesheet" type="text/css" href="logining.css" />
		    <title>登陆中。。。</title>
          </head>
          <body>
  	      </body>
   	</html>
  	<?php
  	}
  }
  
  else{
  	?>
  	<html>
          <head>
            <meta   http-equiv=refresh   content= '1;url=index.html '>
	 	    <link rel="stylesheet" type="text/css" href="logining.css" />
		    <title>登陆中。。。</title>
          </head>
          <body>
          <span class="error">账号或者密码错误，请重新输入</span>
  	      </body>
   	</html>
  	<?php 
  }
?>