<?php 
     include 'manage/employ_list.php';
     include 'manage/administrator_list.php';
     include 'manage/valid_time_list.php';
     include 'manage/publish_time_list.php';
     include 'manage/newslist.php';
     $temp = new valid_time_list();
     $elist = new employ_list();
     $newslist = new newslist();
     $adlist = new administrator_list();
     
     //$newslist ->edit_news('yyy','0000-00-00 00:00:00','yyyrr','2000-02-02 00:00:00','wviugviwuhevwihwieg');
     
     //$elist ->del_employ('oujun','oujun','oujun','15011','15011');
    // $temp ->edit_valid_time('hanks','12:12:12','12:13:12','0000-00-00','hanks','12:12:19','12:13:12','2010-01-08');
     //$temp ->add_valid_time('hanks','12:12:12','12:13:12','0000-00-00')
     //$publish_time_list = new publish_time_list();
    // $publish_time_list ->add_publish_time('hanks','12:12:12','12:13:12','0000-00-00');
    //$publish_time_list ->edit_publish_time('12:12:12','12:13:12','0000-00-00','hehua','12:12:12','12:13:12','0000-00-00');
    //print_r(  $publish_time_list->get_publish_time_list() );
      //print_r(  $publish_time_list->get_list_date('0000-00-00'));
      
    // print  $publish_time_list->get_publish_time_eoploy('12:12:12','12:13:12','0000-00-00');
    //$adlist ->add_administrator('hehua','hehua','hehua',2);
     //$adlist ->edit_administrator('hehua','hehuae','hehua',3);
    // $adlist ->del_administrator('hehua');
     
     
     
     
     
     
     
?>