
<?php
  $path="data/center_data.txt";
  $lb_list = file($path);
  $temp_data = trim($lb_list[0]);
  list($id,$password,$name,$address,$phone) = explode('|', trim($temp_data));
  session_start();  
  $tid=$_SESSION['id'];
  $tcode=$_SESSION['code'];
  
  if ( $tid == $id && $tcode == $password)
  {
  	 ?>
  	 <span class="cho"><a href="add_as">��ӳ�Ա</a></span>
  	<span class="cho"><a href="look_as">�鿴��������</a></span>
  	 <?php
  }
  else 
  {
  	?>
  	<span>�˺Ż������д�����������;</span>
  	<?php
  }
?>