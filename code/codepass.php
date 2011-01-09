
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head> 

    
<link rel="stylesheet" type="text/css" href="logining.css" />
<link rel="stylesheet" type="text/css" href="css/admin.css" />
<title>µÇÂ½ÖÐ</title>
</head>
<body style="background-color:green;">

  
</body>
</html>
<?php 
    include 'manage/administrator_list.php';
    $eid=$_POST['name'];
    $password=$_POST['password'];
    session_start();
    $_SESSION['eid'] = $eid;
    $_SESSION['password'] = $password;
    $ad_list = new administrator_list();
    if(  $ad_list->check_high_account($eid,$password) ){
    	$des = 'admin.php';
    	?>
    	<meta   http-equiv=refresh   content= '1; url=admin.php'>
    	<?php
    }
    
    else{
    	?>
    	<meta   http-equiv=refresh   content= '1; url=first.php'>
    	<?php 
    }
?>


