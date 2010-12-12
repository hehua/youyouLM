<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
  include 'manage/lb_list.php';
  $id = $_POST['id'];
  $password = $_POST['password'];
  
  $list= new lb_list;
  $temp = $list->get_lb_by_id($id);
  if($temp!=0)
  {
  	if( $temp->getPassword()==$password)
  	{
  		if ( $list->del_lb($id) ){
  	 ?>
     <html>
          <head>
            <meta   http-equiv=refresh   content= '1;url=index.html '>
	 	    <link rel="stylesheet" type="text/css" href="logining.css" />
		    <title>删除中。。。</title>
          </head>
          <body>
  	        <span class="success">删除成功</span>  
  	      </body>
   	</html>
   	<?php 
  		}
   	}
  }
  
  else{
  	?>
    <html>
         <head>
           <meta   http-equiv=refresh   content= '1;url=del.html '>
		   <link rel="stylesheet" type="text/css" href="logining.css" />
		   <title>删除中。。</title>
         </head>
         <body>
  	       <span class="error">你的账号或密码不正确，请重新输入</span>  
  	     </body>
  	</html>
  	<?php }
  ?>
   
