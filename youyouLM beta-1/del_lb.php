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
		    <title>ɾ���С�����</title>
          </head>
          <body>
  	        <span class="success">ɾ���ɹ�</span>  
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
		   <title>ɾ���С���</title>
         </head>
         <body>
  	       <span class="error">����˺Ż����벻��ȷ������������</span>  
  	     </body>
  	</html>
  	<?php }
  ?>
   
